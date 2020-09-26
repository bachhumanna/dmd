<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanionCreate;
use App\Http\Requests\CompanionUpdate;
use App\User;
use App\DrivingDetails;
use App\Booking;
use Auth;
use DB;
use Image;
use App\DriversVehicles;

class CompanionController extends Controller {

    public function __construct() {
        $this->middleware('bookingAllow', ['only' => ['create', 'store']]);
    }

    public function index(Request $request) {

        $query = User::Franchisee()->where('user_type', 5)->sortable();
        $query->with('driverVehicles.vehicle');
        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->email) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->phone) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }

        $models = $query->latest()->paginate(25);
        return view('admin.companion.index', compact('models'));
    }

    public function create(Request $request) {
        $vehiclesModel = \App\Vehicles::Franchisee()->pluck('vehicles_number', 'id');
        return view('admin.companion.create', compact('vehiclesModel'));
    }

    public function store(CompanionCreate $request) {
        DB::beginTransaction();

        try {
            $input = $request->all();
            $model = new User($input);
            $model->user_type = 5;
            $model->password = bcrypt($request->password);
            if (permit(['companion.create'])) {
                if ($request->franchisees_id) {
                    $model->franchisees_id = $request->franchisees_id;
                } else {
                    $model->franchisees_id = selectedFranchisees();
                }
            } else {
                $model->franchisees_id = Auth::user()->franchisees_id;
            }

            $profileimage = $request->file('profile_pic');
            if ($profileimage) {
                $inputname = time() . "-" . uniqid() . '.' . $profileimage->getClientOriginalExtension();
                $img = Image::make($profileimage->getRealPath());
                $img->save(public_path('/images/profilepic/' . $inputname));

                $model['profile_pic'] = $inputname;
            }

            $model->save();

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

            $driverDetils->save();




            $driverModel = DriversVehicles::updateOrCreate(
                            [
                        "franchisees_id" => getActiveFranchisee(),
                        "user_id" => $model->id
                            ], [
                        "vehicle_id" => $request->vehicle_id
                            ]
            );

            DB::commit();
            $request->session()->flash('success', 'Companion has been successfully added!');
            return redirect(route('companion.index'));
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {
        $model = User::with("userDriverdetails")->where('user_type', 5)->findOrFail($id);

        $query = Booking::Franchisee();
        $query->where('driver_id', $model->id);
        $models = $query->latest()->paginate(25);

        return view('admin.companion.show', ['model' => $model, 'models' => $models]);
    }

    public function edit($id) {
        $model = User::with("userDriverdetails", 'driverVehicles')->where('user_type', 5)->findOrFail($id);
        $vehiclesModel = \App\Vehicles::Franchisee()->pluck('vehicles_number', 'id');
        return view('admin.companion.edit', compact('model', 'vehiclesModel'));
    }

    public function update(CompanionUpdate $request, $id) {
        pr($request->all());die;
        pr($request->driverVehicles['vehicle_id']);

        DB::beginTransaction();
        try {
            $model = User::where('user_type', 5)->findOrFail($id);
            $input = $request->all();

            $profileimage = $request->file('profile_pic');
            if ($profileimage) {
                $inputname = time() . "-" . uniqid() . '.' . $profileimage->getClientOriginalExtension();
                $img = Image::make($profileimage->getRealPath());
                $img->save(public_path('/images/profilepic/' . $inputname));

                $model['profile_pic'] = $inputname;
            }
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
                        "vehicle_id" => $request->driverVehicles['vehicle_id']
                            ]
            );

            DB::commit();
            $request->session()->flash('success', 'Companion has been successfully Updated!');
            return redirect(route('companion.index'));
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
}
