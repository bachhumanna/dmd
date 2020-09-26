<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Http\Requests\RoleCreate;
use App\Http\Requests\RoleUpdate;
use App\Permission;
use App\PermissionRole;

class RoleController extends Controller {

    public function index(Request $request) {

        $query = Role::franchiseeRole()->sortable();
        if ($request->name) {
            $query->where('name', 'like', "%" . $request->name . "%");
        }
        if ($request->display_name) {
            $query->where('display_name', 'like', "%" . $request->display_name . "%");
        }


        $models = $query->latest()->paginate(20);

        return view('admin.role.index', compact('models'));
    }

    public function create() {

        $permissions = Permission::all();
        $finalPermission = array();
        foreach ($permissions as $permission) {
            $controllerAry = explode(".", $permission->name);
            if (count($controllerAry) > 1) {
                $controllername = $controllerAry[0];

                $finalPermission[$controllername][] = $permission;
            } else {
                $finalPermission["Extra"][] = $permission;
            }
        }
        return view('admin.role.create', ['finalPermission' => $finalPermission,]);
    }

    public function store(RoleCreate $request) {
        DB::beginTransaction();
        try {
            $model = new Role($request->all());
            $model->franchisees_id = getActiveFranchisee();
            $model->save();

            //$model = Role::create();
            $data = array();
            foreach ($request->rolePermission as $permission) {
                $data[] = array('permission_id' => $permission, 'role_id' => $model->id);
            }
            PermissionRole::insert($data);
            DB::commit();
            $request->session()->flash('success', 'Role has been successfully added!');
            return redirect(route('role.index'));
        } catch (Exception $e) {

            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {
        $model = Role::with('users')->find($id);
        return view('admin.role.show', ['model' => $model]);
    }

    public function edit($id) {
        $model = Role::find($id);
        $permissions = Permission::all();
        $finalPermission = array();
        foreach ($permissions as $permission) {
            $controllerAry = explode(".", $permission->name);
            if (count($controllerAry) > 1) {
                $controllername = $controllerAry[0];

                $finalPermission[$controllername][] = $permission;
            } else {
                $finalPermission["Extra"][] = $permission;
            }
        }


        $permissionModel = array();
        foreach ($model->permissions as $val) {
            $permissionModel[] = $val->id;
        }


        return view('admin.role.edit', compact('model', 'permissionModel', 'finalPermission'));
    }

    public function update(RoleUpdate $request, $id) {
        DB::beginTransaction();
        try {
            $modelAttributes = $request->all();
            $model = Role::find($id);
            $model->update($modelAttributes);
            PermissionRole::where("role_id", $model->id)->delete();
            $data = array();
            foreach ($request->rolePermission as $permission) {
                $data[] = array('permission_id' => $permission, 'role_id' => $model->id);
            }
            PermissionRole::insert($data);
            DB::commit();
            $request->session()->flash('success', 'Role has been successfully Updated!');
            return redirect(route('role.index'));
        } catch (Exception $e) {

            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function destroy($id) {
        $role = Role::findOrFail($id);
        $role->forceDelete();
        return redirect()->back();
    }

}
