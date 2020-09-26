<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DefaultPermissions;
use App\Permission;
use DB;

class DefaultPermissionsController extends Controller {

    public $defaultPermission = array(
        1 => ['type' => 'Franchisor', 'is_super' => 0, 'type_id' => 1],
        2 => ['type' => 'Franchisee', 'is_super' => 0, 'type_id' => 2],
        3 => ['type' => 'Franchisee', 'is_super' => 1, 'type_id' => 2],
        4 => ['type' => 'Driver',     'is_super' => 0, 'type_id' => 3],
        5 => ['type' => 'Driver',     'is_super' => 1, 'type_id' => 3],
        6 => ['type' => 'Companion',     'is_super' => 0, 'type_id' => 5],
        7 => ['type' => 'Companion',     'is_super' => 1, 'type_id' => 5],
    );

    public function index(Request $request) {
        $models = $this->defaultPermission;
        return view('admin.default-permissions.index', compact('models'));
    }

    public function edit($id) {
        $model = $this->defaultPermission[$id];
        $type = $model['type_id'];
        $is_super = $model['is_super'];

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
        $defaultPermission = DefaultPermissions::where('type', $type)->where('is_super', $is_super)->pluck('name')->toArray();

        return view('admin.default-permissions.edit', compact('model', 'defaultPermission', 'finalPermission', 'id'));
    }

    public function update(Request $request, $id) {

        $model = $this->defaultPermission[$id];
        $type = $model['type_id'];
        $is_super = $model['is_super'];

        DB::beginTransaction();
        try {
            $modelAttributes = $request->all();
            DefaultPermissions::where('type', $type)->where('is_super', $is_super)->delete();
            
            $data = array();
            foreach ($request->rolePermission as $permission) {
                $data[] = array(
                    'is_super' => $is_super,
                    'type' => $type,
                    'name' => $permission,
                );
            }
            DefaultPermissions::insert($data);
            DB::commit();
            $request->session()->flash('success', 'Default Permissions has been successfully Updated!');
            return redirect(route('default-permissions.index'));
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

}
