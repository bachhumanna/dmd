<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\DriversVehicles;

class DriversVehiclesController extends Controller {

    public function __construct() {
        $this->middleware('bookingAllow', ['only' => ['edit', 'update']]);
        //$this->middleware('bookingAllow', ['except' => ['index', 'show']]);
    }
    public function index(Request $request) {

        $query = User::Franchisee()->where('user_type', 3);
        $query->with(["driverVehicles.vehicle"]);
        if ($request->vehicles_model) {
            $query->where('vehicles_model', 'like', '%' . $request->vehicles_model . '%');
        }
        if ($request->vehicles_company) {
            $query->where('vehicles_company', 'like', '%' . $request->vehicles_company . '%');
        }
        $models = $query->latest()->paginate(25);
        return view('admin.drivers-vehicles.index', compact('models'));
    }

    public function edit($id) {
        $model = User::Franchisee()->where('user_type', 3)->with(["driverVehicles.vehicle"])->find($id);
        $vehicle = \App\Vehicles::franchisee()
                        ->whereDoesntHave('driver', function($q) use($model) {
                            $q->where('user_id', "!=", $model->id);
                        })->pluck('vehicles_number', 'id');

        return view('admin.drivers-vehicles.edit', compact('model', 'vehicle'));
    }

    public function update(Request $request, $id) {
        try {
            $model = DriversVehicles::updateOrCreate(["franchisees_id" => getActiveFranchisee(), "user_id"=> $id],["vehicle_id" => $request->vehicle_id]
                        );
            $request->session()->flash('success', 'Vehicles has been successfully Updated!');
            return redirect(route('drivers-vehicles.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function destroy($id) {
        try {
            $model = DriversVehicles::where("user_id", $id)->first();
            $model->delete();
            \session()->flash('success', 'Vehicles has been successfully Deleted!');
        } catch (Exception $e) {
            \session()->flash('error', 'Oops something went wrong try again !');
        }
        return redirect()->back();
    }

}
