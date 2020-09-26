<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FranchiseeUserCreate;
use App\Http\Requests\FranchiseeUserUpdate;
use App\User;
use Auth;
use DB;
class FranchiseeUserController extends Controller {

    public function index(Request $request) {
        //$query = User::Franchisee()->franchiseeUser();
        $query = User::Franchisee()->franchiseeUser();
        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->email) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->phone) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }
        if ($request->suburb) {
            $query->where('suburb', 'like', '%' . $request->suburb . '%');
        }
        if ($request->state) {
            $query->where('state', $request->state);
        }
        if (!getActiveFranchisee()) {
            $query->with('franchisees');
        }

        $models = $query->orderBy('id', 'DESC')->paginate(25);


        return view('admin.franchisee-user.index', compact('models'));
    }

    public function create(Request $request) {
        $allrole = \App\Role::FranchiseeRole()->get();
        return view('admin.franchisee-user.create', compact('allrole'));
    }

    public function store(FranchiseeUserCreate $request) {
        DB::beginTransaction();
        try {

            $input = $request->all();
            $model = new User($input);
            $model->user_type = 2;
            $model->password = bcrypt($request->password);
            if (franchiseeUser(true) || permit(['franchisee-user.store'])) {
                if ($request->franchisees_id) {
                    $model->franchisees_id = $request->franchisees_id;
                } else {
                    $model->franchisees_id = selectedFranchisees();
                }
            } else {
                $model->franchisees_id = Auth::user()->franchisees_id;
            }

            if (franchiseeUser(true) && $request->is_super) {
                $model->is_super = $request->is_super;
            }

            $model->save();
            if ($model->is_super == 0) {
                if ($request->role_id) {
                    foreach ($request->role_id as $role) {
                        $userroleDetils = new RoleUser();
                        $userroleDetils->role_id = $role;
                        $userroleDetils->user_id = $model->id;
                        $userroleDetils->save();
                    }
                }
            }
            DB::commit();
            $request->session()->flash('success', 'Franchisee User has been successfully added!');
            return redirect(route('franchisee-user.index'));
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {

        $model = User::franchiseeUser()->findOrFail($id);
        return view('admin.franchisee-user.show', ['model' => $model]);
    }

    public function edit($id) {
        $model = User::franchiseeUser()->findOrFail($id);
        return view('admin.franchisee-user.edit', compact('model'));
    }

    public function update(FranchiseeUserUpdate $request, $id) {
        try {
            $model = User::franchiseeUser()->findOrFail($id);

            if (franchiseeUser(true) && $request->is_super) {
                $model->is_super = $request->is_super;
            }
            $input = $request->all();
            $model->update($input);
            $request->session()->flash('success', 'Franchisee User has been successfully Updated!');
            return redirect(route('franchisee-user.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function destroy($id) {
        $role = User::findOrFail($id);
        $role->forceDelete();
        return redirect()->back();
    }
    
    
    
    public function showallStaff(Request $request) {
        //$query = User::Franchisee()->franchiseeUser();
        $query = User::Franchisee();
        
        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->email) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->phone) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }
        if ($request->suburb) {
            $query->where('suburb', 'like', '%' . $request->suburb . '%');
        }
        if ($request->state) {
            $query->where('state', $request->state);
        }
        if (!getActiveFranchisee()) {
            $query->with('franchisees');
        }

        $models = $query->orderBy('id', 'DESC')->paginate(25);
       

        return view('admin.franchisee-user.allstaff', compact('models'));
    }
    
    
    

}
