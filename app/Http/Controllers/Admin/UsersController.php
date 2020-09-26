<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdate;
use App\User;
use Auth;

class UsersController extends Controller {

    public function index(Request $request) {

        $query = User::Franchisee()->where('user_type', 4);

        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->email) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->phone) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }

        if ($request->dob) {
            $query->where('dob', $request->dob);
        }


        $models = $query->orderBy('id', 'DESC')->paginate(25);

        return view('admin.users.index', compact('models'));
    }

    public function create(Request $request) {

        return view('admin.users.create');
    }

    public function store(UserUpdate $request) {
        try {
            $input = $request->all();
            $input['user_type'] = 4;
            $input['password'] = bcrypt($request->password);
            User::create($input);
            $request->session()->flash('success', 'Users has been successfully added!');
            return redirect(route('users.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {

        $model = User::where('user_type', 4)->findOrFail($id);
        return view('admin.users.show', ['model' => $model]);
    }

    public function edit($id) {
        $model = User::where('user_type', 4)->findOrFail($id);
        return view('admin.users.edit', compact('model'));
    }

    public function update(UserUpdate $request, $id) {
        try {
            $model = User::where('user_type', 4)->findOrFail($id);

            $input = $request->all();

            $model->update($input);
            $request->session()->flash('success', 'Users has been successfully Updated!');
            return redirect(route('users.index'));
        } catch (Exception $e) {
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

    public function changePassword() {
        return view('admin.users.changepassword');
    }

    public function postChangePassword(Request $request) {
        $validatedData = $request->validate([
            //  'current_password' => 'required',
            'password' => 'required',
            're_password' => 'required|same:password',
        ]);


        User::where('id', Auth::user()->id)->update(['password' => bcrypt($request->password)]);
        $request->session()->flash('success', 'Your password has been successfully updated');
        return redirect()->back();
    }

    public function forgotpasswordlink($id) {

        return view('auth.forgotpassword', ['id' => $id]);
    }

    public function postforgotpasswordpost(Request $request) {
        $input = $request->all();
        $userid = $input['id'];

        $validatedData = $request->validate([
            //  'current_password' => 'required',
            'password' => 'required',
            're_password' => 'required|same:password',
        ]);

        //User::where('id', Auth::user()->id)->update(['password' => bcrypt($request->password)]);

        User::where('id', $userid)->update(['password' => bcrypt($request->password)]);
        $request->session()->flash('success', 'Your password has been successfully updated');
        return redirect()->back();
    }

}
