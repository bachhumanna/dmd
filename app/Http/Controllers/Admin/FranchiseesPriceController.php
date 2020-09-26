<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FranchiseesPrice;
use App\Http\Requests\FranchiseesPriceUpdate;
use DB;
use Auth;

class FranchiseesPriceController extends Controller {

    public function index(Request $request) {

        $query = FranchiseesPrice::franchisee()->has('franchisees');


        $models = $query->orderBy('id', 'DESC')->paginate(25);

        return view('admin.franchisees-price.index', compact('models'));
    }

    public function edit($id) {
        $model = FranchiseesPrice::franchisee()->findOrFail($id);

        return view('admin.franchisees-price.edit', compact('model'));
    }

    public function update(FranchiseesPriceUpdate $request, $id) {

        DB::beginTransaction();
        try {
            $modelAttribute = $request->all();
            $model = FranchiseesPrice::franchisee()->findOrFail($id);
            $model->update($modelAttribute);
            DB::commit();
            $request->session()->flash('success', 'Franchisee has been successfully Updated!');
            return redirect(route('franchisees-price.index'));
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function businessDetails() {

        $franchiseeid = selectedFranchisees();
        if (!$franchiseeid) {
            $franchiseeid = Auth::user()->franchisees_id;
        }
        $model = FranchiseesPrice::franchisee()->findOrFail($franchiseeid);
        $franchiseeModel = \App\CompanyInfo::where('franchisees_id', $franchiseeid)->first();

        $model->vat_registration = $franchiseeModel->vat_reg;
        return view('admin.franchisees-price.business-details', compact('model'));
    }

    public function updateBusinessDetails(Request $request) {

        $validatedData = $request->validate([
            'driver_cost' => 'required|numeric',
            'vehicle_cost' => 'required|numeric',
            'comfort_cost' => 'required|numeric',
            'paid_mileage' => 'required|numeric',
            'base_driving_cost' => 'required|numeric',
            'waiting_time_cost' => 'required|numeric',
            'companionship_cost' => 'required|numeric',
        ]);
        $franchiseeid = selectedFranchisees();
        if (!$franchiseeid) {
            $franchiseeid = Auth::user()->franchisees_id;
        }
        $modelAttribute = $request->all();
        $model = FranchiseesPrice::franchisee()->findOrFail($franchiseeid);
        $model->update($modelAttribute);
        \App\CompanyInfo::updateOrCreate(["franchisees_id" => $franchiseeid], ['vat_reg'=>$request->vat_registration]);
        $request->session()->flash('success', 'Business Details has been successfully Updated!');
        return redirect(route('business-details'));
    }

}
