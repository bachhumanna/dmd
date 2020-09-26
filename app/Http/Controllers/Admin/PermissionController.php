<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Route;

class PermissionController extends Controller {

    public function index() {
        $models = Permission::paginate(10);
        return view('permission.index', compact('models'));
    }

    public function create() {
        return view('permission._form');
    }

    public function store(Request $request) {
        $modelAttributes = $request->all();
        $model = new Permission($modelAttributes);
        if ($model->save()) {
            return redirect(route('permissions.create'));
        } else {
            return redirect()->back()->withErrors($validator, 'modelError')->withInput();
        }
    }

    public function show($id) {
        
    }

    public function edit($id) {
        $model = Permission::find($id);
        return view('permission._form', compact('model'));
    }

    public function update(Request $request, $id) {
        $modelAttributes = Request::all();

        $model = Permission::find($id);
        $model->update($modelAttributes);
        return redirect(route('permission.index'));
    }

    public function destroy($id) {
        Permission::find($id)->delete();
        return redirect()->back();
    }

    public function routeCron() {

        $routeCollection = Route::getRoutes();
        foreach ($routeCollection as $value) {
            //echo "<br>".$value->getPath().' - '.$value->getName();

            if ($value->getName()) {
                $modelAttributes = array(
                    'name' => $value->getName(),
                    'display_name' => '',
                    'description' => ''
                );
                $model = new Permission($modelAttributes);
                $model->save();
            }
        }
    }

}
