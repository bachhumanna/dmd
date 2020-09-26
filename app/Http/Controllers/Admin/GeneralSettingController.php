<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GeneralSetting;
use App\Http\Requests\GeneralSettingUpdate;
use App\Franchisee;
use Auth;

class GeneralSettingController extends Controller {

    public function index(Request $request) {


        if (isSuperAdmin()) {
            if (selectedFranchisees()) {
                $franchisees_id = selectedFranchisees();
                $model = \App\CompanyInfo::where("franchisees_id",$franchisees_id)->first();
                return view('admin.companyinfo.index', compact('model'));
            } else {
                $query = GeneralSetting::query();
                $models = $query->orderBy('display_order')->paginate(200);
                $teamModel = \App\Team::where('show_company_details',1)->get();
                return view('admin.general-setting.index', compact('models','teamModel'));
            }
        } else {
            $franchisees_id = selectedFranchisees();
            $model = \App\CompanyInfo::where("franchisees_id",$franchisees_id)->first();
            return view('admin.companyinfo.index', compact('model'));
        }
    }

    public function edit($id) {
        $model = GeneralSetting::find($id);
        return view('admin.general-setting.edit', compact('model'));
    }

    public function update(GeneralSettingUpdate $request, $id) {
        try {
            $model = GeneralSetting::find($id);
            $input = $request->all();
            $model->update($input);
            $request->session()->flash('success', 'General Setting has been successfully Updated!');
            return redirect(route('general-setting.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

}
