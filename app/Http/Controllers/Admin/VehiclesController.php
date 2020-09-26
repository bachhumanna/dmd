<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Vehiclesrequest;
use App\Vehicles;

class VehiclesController extends Controller {
    public function __construct() {
        $this->middleware('bookingAllow', ['only' => ['create', 'store']]);
    }
    public function index(Request $request) {

        $query = Vehicles::Franchisee()->sortable();

        if ($request->vehicles_model) {
            $query->where('vehicles_model', 'like', '%' . $request->vehicles_model . '%');
        }
        if ($request->vehicles_company) {
            $query->where('vehicles_company', 'like', '%' . $request->vehicles_company . '%');
        }
        if ($request->vehicles_number) {
            $query->where('vehicles_number', 'like', '%' . $request->vehicles_number . '%');
        }
        if ($request->max_capacity) {
            $query->where('max_capacity', 'like', '%' . $request->max_capacity . '%');
        }

        if (!getActiveFranchisee()) {
            $query->with('franchisees');
        }

        $models = $query->orderBy('id', 'DESC')->paginate(25);


        return view('admin.vehicles.index', compact('models'));
    }

    public function create(Request $request) {
        $bodyType = \App\VehiclesBodyType::pluck('type', 'id')->toArray();
        return view('admin.vehicles.create', compact('model', 'bodyType'));
    }

    public function store(Vehiclesrequest $request) {
        try {

            $model = new Vehicles($request->all());

            $model->franchisees_id = getActiveFranchisee();
            $model->save();
            $request->session()->flash('success', 'Vehicles has been successfully added!');
            return redirect(route('vehicles.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {

        $model = Vehicles::with("bodyType")->findOrFail($id);
        return view('admin.vehicles.show', ['model' => $model]);
    }

    public function edit($id) {
        $model = Vehicles::withTrashed()->with("bodyType")->findOrFail($id);
        $bodyType = \App\VehiclesBodyType::pluck('type', 'id')->toArray();

        return view('admin.vehicles.edit', compact('model', 'bodyType'));
    }

   public function update(Vehiclesrequest $request, $id) {
        try {
            $model = Vehicles::find($id);

            $input = $request->all();

            $model->update($input);
            $request->session()->flash('success', 'Vehicles has been successfully Updated!');
            return redirect(route('vehicles.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }


    public function destroy($id) {
        try {
            $model = Vehicles::withTrashed()->findOrFail($id);

            if ($model->trashed()) {
                $model->restore();
                \session()->flash('success', 'Vehicles has been successfully Restore!');
            } else {
                $model->delete();
                \session()->flash('success', 'Vehicles has been successfully Deleted!');
            }
        } catch (Exception $e) {
            \session()->flash('error', 'Oops something went wrong try again !');
        }
        return redirect()->back();
    }

}
