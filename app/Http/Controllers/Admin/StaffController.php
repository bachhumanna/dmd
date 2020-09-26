<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AllstaffCreate;
use App\Http\Requests\AllstaffUpdate;
use App\User;
use App\DrivingDetails;
use App\Certificate;
//use App\Booking;
use Auth;
use DB;
use Image;
use App\DriversVehicles;
use Illuminate\Support\Facades\Validator; 

class StaffController extends Controller {

//    public function __construct() {
//        $this->middleware('bookingAllow', ['only' => ['create', 'store']]);
//    }

    public function index(Request $request) {

        $query = User::Franchisee()->sortable();
        $query->has('franchisees');
        $query->with('franchisees');

        if ($request->username) {
            $query->where('username', 'like', '%' . $request->username . '%');
        }
        if ($request->name) {
            $query->where(function($q) use ($request) {
                $q->orWhere('name', 'like', '%' . $request->name . '%');
                $q->orWhere('surname', 'like', '%' . $request->name . '%');
            });
        }
        if ($request->email) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->phone) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }

        if (!getActiveFranchisee()) {
            $query->with('franchisees');
        }
        $query->orderByRaw("FIELD(user_type , '3', '5', '2', '1') ASC");
        $models = $query->paginate(25);

        return view('admin.allstaff.index', compact('models'));
    }

    public function create(Request $request) {
        $vehiclesModel = \App\Vehicles::Franchisee()->pluck('vehicles_number', 'id');
        return view('admin.allstaff.create', compact('vehiclesModel'));
    }

    public function store(AllstaffCreate $request) {

        //pr($request->all()); //die;

        DB::beginTransaction();

        try {
            
            $input = $request->all();

            if($input['dob']){
                $input['dob'] = calculateMySqlDateOnly($input['dob']);
            }

            if($input['licence_expiry_date']){
                $input['licence_expiry_date'] = calculateMySqlDateOnly($input['licence_expiry_date']);
            }

            if($input['employment_start_date']){
                $input['employment_start_date'] = calculateMySqlDateOnly($input['employment_start_date']);
            }

            //pr($input); die;

            $model = new User($input);
            
            $model->user_type = $request->user_type;
            $model->is_super = $request->is_super;
            $model->password = bcrypt($request->password);
            
            if (permit(['allstaff.create'])) {
                if ($request->franchisees_id) {
                    $model->franchisees_id = $request->franchisees_id;
                } else {
                    $model->franchisees_id = selectedFranchisees();
                }
            } else {
                $model->franchisees_id = Auth::user()->franchisees_id;
            }

            $profileimage = $request->file('profile_pic_file');
            if ($profileimage) {
                $inputname = time() . "-" . uniqid() . '.' . $profileimage->getClientOriginalExtension();
                $img = Image::make($profileimage->getRealPath());
                $img->save(public_path('/images/profilepic/' . $inputname));

                $model->profile_pic = $inputname;
            }

            // update
            $model->save();

            // create new
            $driverDetils = new DrivingDetails($input);
            $driverDetils->user_id = $model->id;

            $image = $request->file('drivinglicence_image_pdf');
            if ($image) {
                $inputname = time() . "-" . uniqid() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->save(public_path('/images/drivingrequest/' . $inputname));

                $driverDetils->drivinglicence = $inputname;
            }

            $phlimage = $request->file('phl_image');
            if ($phlimage) {
                $inputname = time() . "-" . uniqid() . '.' . $phlimage->getClientOriginalExtension();
                $img = Image::make($phlimage->getRealPath());
                $img->save(public_path('/images/phlimage/' . $inputname));

                $driverDetils->phl_image = $inputname;
            }

            $passportimage = $request->file('passport_image');
            if ($passportimage) {
                $inputname = time() . "-" . uniqid() . '.' . $passportimage->getClientOriginalExtension();
                $img = Image::make($passportimage->getRealPath());
                $img->save(public_path('/images/passportimg/' . $inputname));
                $driverDetils->passport_image = $inputname;
            }

            $trainingcertificates = $request->file('training_certificates');
            if ($trainingcertificates) {
                $inputname = time() . "-" . uniqid() . '.' . $trainingcertificates->getClientOriginalExtension();
                $img = Image::make($trainingcertificates->getRealPath());
                $img->save(public_path('/images/certificates/' . $inputname));
                $driverDetils->training_certificates = $inputname;
            }

            // update
            $driverDetils->save();

            $certificatename = $request->certificate_name;
            $certificate_expdate = $request->certificate_expiry_date;
            $certificateimg = $request->file('certificate_img');


            //\App\VatReg::where("franchisees_id", $franchisees_id)->delete();

            foreach ($certificatename as $key => $certificate) {

                if ($certificatename && $certificateimg[$key]) {

                    $inputname = time() . "-" . uniqid() . '.' . $certificateimg[$key]->getClientOriginalExtension();
                    $img = Image::make($certificateimg[$key]->getRealPath());
                    $img->save(public_path('/images/certificates/' . $inputname));

                    //
                    if($certificate_expdate[$key]){
                        $certificate_expdate = calculateMySqlDateOnly($certificate_expdate[$key]);
                    }

                    $certificateData[] = array(
                        "user_id" => $model->id,
                        "certificate_expiry_date" => $certificate_expdate,
                        "certificate_name" => $certificatename[$key],
                        'certificate_img' => $inputname
                    );
                }
            }

            if (isset($certificateData)) {
                \App\Certificate::insert($certificateData);
            }

            $driverModel = DriversVehicles::updateOrCreate(
                [
                "franchisees_id" => getActiveFranchisee(),
                "user_id" => $model->id
                ],[
                "vehicle_id" => $request->vehicle_id
                ]
            );


            DB::commit();

            $request->session()->flash('success', 'Staff has been successfully added!');
            
            return redirect(route('staff.index'));
        }catch (Exception $e) {
            
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }


    // show
    public function show($id) {
        $model = User::with("userDriverdetails", 'userCertificateDetails')->findOrFail($id);
        return view('admin.allstaff.show', ['model' => $model]);
    }

    // edit
    public function edit($id) {
        $model = User::with("userDriverdetails", 'driverVehicles', 'userCertificateDetails')->findOrFail($id);
        $vehiclesModel = \App\Vehicles::Franchisee()->pluck('vehicles_number', 'id');
        return view('admin.allstaff.edit', compact('model', 'vehiclesModel'));
    }

    public function update(AllstaffUpdate $request, $id) {

        //pr($request->all());

        DB::beginTransaction();
        
        try {
            //$model = User::findOrFail($id);
            $model = User::with("userDriverdetails", 'driverVehicles', 'userCertificateDetails')->findOrFail($id);
            
            //pr($model->toArray());
            //die();
            
            // form data
            $input = $request->all();

            if($input['dob']){
                $input['dob'] = calculateMySqlDateOnly($input['dob']);
            }

            if($input['licence_expiry_date']){
                $input['licence_expiry_date'] = calculateMySqlDateOnly($input['licence_expiry_date']);
            }

            if($input['employment_start_date']){
                $input['employment_start_date'] = calculateMySqlDateOnly($input['employment_start_date']);
            }

            if($input['phl_expiry_date']){
                $input['phl_expiry_date'] = calculateMySqlDateOnly($input['phl_expiry_date']);
            }

            //pr($input); die;

            // set
            $model->user_type = $request->user_type;
            $model->is_super = $request->is_super;

            $profileimage = $request->file('profile_pic_file');
            if ($profileimage) {
                $inputname = time() . "-" . uniqid() . '.' . $profileimage->getClientOriginalExtension();
                $img = Image::make($profileimage->getRealPath());
                $img->save(public_path('/images/profilepic/' . $inputname));

                $input['profile_pic'] = $inputname;
            }
            
            // update
            $model->update($input);

            $inputmodelAttribute = $request->all();

            $image = $request->file('drivinglicence_image_pdf');
            if ($image) {
                $inputname = time() . "-" . uniqid() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->save(public_path('/images/drivingrequest/' . $inputname));

                $inputmodelAttribute['drivinglicence'] = $inputname;
            }

            $phlimage = $request->file('phl_image');
            if ($phlimage) {
                $inputname = time() . "-" . uniqid() . '.' . $phlimage->getClientOriginalExtension();
                $img = Image::make($phlimage->getRealPath());
                $img->save(public_path('/images/phlimage/' . $inputname));

                $inputmodelAttribute['phl_image'] = $inputname;
            }

            $passportimage = $request->file('passport_image');
            if ($passportimage) {
                $passinputname = time() . "-" . uniqid() . '.' . $passportimage->getClientOriginalExtension();
                $img = Image::make($passportimage->getRealPath());
                $img->save(public_path('/images/passportimg/' . $passinputname));
                $inputmodelAttribute['passport_image'] = $passinputname;
            }

            $trainingcertificates = $request->file('training_certificates');
            if ($trainingcertificates) {
                $inputnamee = time() . "-" . uniqid() . '.' . $trainingcertificates->getClientOriginalExtension();

                $img = Image::make($trainingcertificates->getRealPath());
                $img->save(public_path('/images/certificates/' . $inputnamee));
                $inputmodelAttribute['training_certificates'] = $inputnamee;
            }

            $driverDetails = DrivingDetails::where("user_id", $id)->first();
            $driverDetails->update($inputmodelAttribute);

            $model = DriversVehicles::updateOrCreate([
                "franchisees_id" => getActiveFranchisee(),
                "user_id" => $id
                ], [
                "vehicle_id" => $request->vehicle_id
                ]
            );

            $certificatename = $request->certificate_name;
            $certificate_expdate = $request->certificate_expiry_date;
            $certificateimg = $request->file('certificate_img');

            //\App\Certificate::where("user_id", $id)->delete();

            foreach ($certificatename as $key => $certificate) {

                if ($certificatename && $certificateimg[$key]) {

                    $inputname = time() . "-" . uniqid() . '.' . $certificateimg[$key]->getClientOriginalExtension();
                    $img = Image::make($certificateimg[$key]->getRealPath());
                    $img->save(public_path('/images/certificates/' . $inputname));


//                    $certificateData[] = array(
//                        "user_id" => $id,
//                        "certificate_expiry_date" => $certificate_expdate[$key],
//                        "certificate_name" => $certificatename[$key],
//                        'certificate_img' =>$inputname
//                    );

                    //
                    if($certificate_expdate[$key]){
                        $certificate_expdate = calculateMySqlDateOnly($certificate_expdate[$key]);
                    }


                    $certificateData = [
                        "user_id" => $id,
                        "certificate_expiry_date" => $certificate_expdate,
                        "certificate_name" => $certificatename[$key],
                        'certificate_img' => $inputname
                    ];
                    \App\Certificate::updateOrCreate($certificateData);
                }
            }
//            if(isset($certificateData)){
//                \App\Certificate::updateOrCreate($certificateData);
//            }

            DB::commit();

            $request->session()->flash('success', 'Staff has been successfully Updated!');

            return redirect(route('staff.index'));
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function destroy($id) {
        //\Session::flash('error', 'Action not allow!');
        //return redirect()->back();
        $role = User::findOrFail($id);
        $role->forceDelete();
        return redirect()->back();
    }

    public function changePassword(Request $request, $id) {
        $rule = [
            'password' => 'required',
            're_password' => 'required|same:password',
        ];

        $validator = Validator::make($request->all(), $rule);


        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $validationError = validationError($errors);
            return response()->json(['response' => 0, 'errors' => $validationError]);
        }





        if (User::where('id', $id)->update(['password' => bcrypt($request->password)])) {
            return response()->json(['response' => 1, 'message' => 'Password has been successfully Updated!']);
        } else {
            return response()->json(['response' => 2, 'message' => 'Error']);
        }
    }

    public function changepassPopup($id) {
        return view('admin.allstaff.changepassword', ['id' => $id]);
    }

    public function certificateDelete($id) {
        $certificate = Certificate::find($id);
        if ($certificate) {
            $certificate->forceDelete();
            \Session::flash('success', 'Certificate has been successfully deleted!');
        }
        return response()->json(['name' => 'Abigail', 'state' => 'CA']);
    }

}
