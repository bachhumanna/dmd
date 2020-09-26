<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FranchisorCreate;
use App\Http\Requests\FranchisorUpdate;
//use Illuminate\Support\Facades\Validator;
use App\User;
use App\Role;
use App\RoleUser;
use Auth;
use DB;

class FranchisorController extends Controller {

    public function index(Request $request) {
        $query = User::where('user_type', 1)->sortable();
        $query->whereNull('franchisees_id');
        if(!isSuperAdmin()){
            $query->whereNull('is_super');
        }

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
        return view('admin.franchisor.index', compact('models'));
    }

    public function create(Request $request) {

        $allrole = \App\Role::FranchiseeRole()->get();
        return view('admin.franchisor.create', compact('allrole'));
    }

    public function store(FranchisorCreate $request) {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $model = new User($input);
            $model->user_type = 1;

            $model->password = bcrypt($request->password);
            if (isSuperAdmin() && $request->is_super) {
                $model->is_super = $request->is_super;
            }
            $model->save();

            if ($model->is_super == 0) {
                if($request->role_id){
                    foreach($request->role_id as $role){
                        $userroleDetils = new RoleUser();
                        $userroleDetils->role_id = $role;
                        $userroleDetils->user_id = $model->id;
                        $userroleDetils->save();
                    }
                }
            }
            DB::commit();
            $request->session()->flash('success', 'Franchisor has been successfully added!');
            return redirect(route('franchisor.index'));
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {

        $model = User::where('user_type', 1)->findOrFail($id);

        return view('admin.franchisor.show', ['model' => $model]);
    }

    public function edit($id) {
        $allrole = \App\Role::FranchiseeRole()->get();
        $model = User::where('user_type', 1)->findOrFail($id);
        $userRole = $model->roles->pluck('id')->all();
        return view('admin.franchisor.edit', compact('model', 'allrole', 'userRole'));
    }

    public function update(FranchisorUpdate $request, $id) {
        DB::beginTransaction();
        try {
            $model = User::where('user_type', 1)->findOrFail($id);
            if (isSuperAdmin() && $request->is_super) {
                $model->is_super = $request->is_super;
            }
            $input = $request->all();
            $model->update($input);
            if ($model->is_super == 0) {
                $model->roles()->sync($request->role_id);
            }
            DB::commit();
            $request->session()->flash('success', 'Franchisor has been successfully Updated!');
            return redirect(route('franchisor.index'));
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
