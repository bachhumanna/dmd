<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DrivingRequestCreate;
use App\DrivingRequest;
use App\User;
use App\DrivingDetails;
use Image;
use DB;
use Illuminate\Support\Facades\Validator;

class DrivingRequestController extends Controller {

    public function index(Request $request) {
        $query = DrivingRequest::query();
        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->email) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->phone) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }

        $models = $query->orderBy('id', 'DESC')->paginate(25);
        return view('admin.drivingrequest.index', compact('models'));
    }

    public function create() {
        return view('admin.drivingrequest.create');
    }

    public function store(DrivingRequestCreate $request) {
        try {
            $data = $request->all();

            $string = $request->name;
            $firstCharacter = $string[0];

            $secondstring = $request->surname;
            $secCharacter = $secondstring[0];
            $shortname = $firstCharacter . $secCharacter;

            $data['short_name'] = $shortname;

            $image = $request->file('drivinglicence_image_pdf');
            if ($image) {
                $inputname = time() . "-" . uniqid() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->save(public_path('/images/drivingrequest/' . $inputname));

                $data['drivinglicence'] = $inputname;
            }

            $profileimage = $request->file('profile_pic');
            if ($profileimage) {
                $inputname = time() . "-" . uniqid() . '.' . $profileimage->getClientOriginalExtension();
                $img = Image::make($profileimage->getRealPath());
                $img->save(public_path('/images/profilepic/' . $inputname));

                $data['profile_pic'] = $inputname;
            }

            $phlimage = $request->file('phl_image');
            if ($phlimage) {
                $inputname = time() . "-" . uniqid() . '.' . $phlimage->getClientOriginalExtension();
                $img = Image::make($phlimage->getRealPath());
                $img->save(public_path('/images/phlimage/' . $inputname));

                $data['phl_image'] = $inputname;
            }


            $passportimage = $request->file('passport_image');
            if ($passportimage) {
                $inputname = time() . "-" . uniqid() . '.' . $passportimage->getClientOriginalExtension();
                $img = Image::make($passportimage->getRealPath());
                $img->save(public_path('/images/passportimg/' . $inputname));

                $data['passport_image'] = $inputname;
            }

            DrivingRequest::create($data);
            $request->session()->flash('success', 'Driving Request has been successfully added!');
            return redirect(route('driving-request.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {
        $model = DrivingRequest::findOrFail($id);
        return view('admin.drivingrequest.show', ['model' => $model]);
    }

    public function drivingrequeststore(Request $request, $id) {
        DB::beginTransaction();
        try {
            $model = DrivingRequest::find($id);
            //$shortname =$model->short_name;

            $user_type = 3;
            $status = 1;
            $usersAttribute = $model->toArray();
            $rules = [
                'email' => 'required|unique:users|max:255',
            ];
            $validator = Validator::make($usersAttribute, $rules);
            if ($validator->passes()) {
                $userModel = new User($usersAttribute);

                $userModel->password = 1234;
                $userModel->user_type = $user_type;
                $userModel->status = $status;
                $userModel->save();

                $driverDetils = new DrivingDetails($usersAttribute);
                $driverDetils->user_id = $userModel->id;
                $driverDetils->short_name = $model->short_name;
                $driverDetils->save();

                $model->update(['status' => 1]);
                DB::commit();

                $request->session()->flash('success', 'Driving Details successfully added!');
                return redirect(route('driving-request.index'));
            } else {
                $request->session()->flash('error', $validator->errors()->first());
                return redirect()->back();
            }
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
            return redirect()->back();
        }
    }

    public function destroy($id) {
        try {
            $model = DrivingRequest::withTrashed()->findOrFail($id);

            if ($model->trashed()) {
                $model->restore();
                \session()->flash('success', 'Franchisee has been successfully Restore!');
            } else {
                $model->delete();
                \session()->flash('success', 'Driving Request has been successfully Deleted!');
            }
        } catch (Exception $e) {
            \session()->flash('error', 'Oops something went wrong try again !');
        }
        return redirect(route('driving-request.index'));
    }

}
