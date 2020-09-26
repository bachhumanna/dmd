<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CompanyInfo;
use App\User;
use App\Director;
use Auth;
use Image;

class CompanyInfoController extends Controller {

    public function index() {

        if (isSuperAdmin()) {
            if (selectedFranchisees()) {
                $franchisees_id = selectedFranchisees();
                $model = \App\CompanyInfo::with('franchisees', "vatreg", "socialMedia", "directors")->where("franchisees_id", $franchisees_id)->first();

                return view('admin.companyinfo.index', compact('model'));
            } else {
                $query = \App\GeneralSetting::query();
                $models = $query->orderBy('display_order')->paginate(200);
                $teamModel = \App\Team::where('show_company_details', 1)->get();
                return view('admin.general-setting.index', compact('models', 'teamModel'));
            }
        } else {
            $franchisees_id = selectedFranchisees();
            $model = \App\CompanyInfo::with("vatreg", "socialMedia", 'franchisees')->where("franchisees_id", $franchisees_id)->first();
            return view('admin.companyinfo.index', compact('model'));
        }
    }

    public function edit() {


        if (isSuperAdmin()) {

            if (selectedFranchisees()) {
                $franchisees_id = selectedFranchisees();
                $model = \App\CompanyInfo::with('franchisees', "vatreg", "socialMedia", "directors")->where("franchisees_id", $franchisees_id)->first();

                return view('admin.companyinfo.edit', compact('model'));
            } else {
                $query = \App\GeneralSetting::query();
                $models = $query->orderBy('display_order')->paginate(200);
                $teamModel = \App\Team::where('show_company_details', 1)->get();
                return view('admin.companyinfo.franchisor-edit', compact('models', 'teamModel'));
            }
        } else {
            $franchisees_id = selectedFranchisees();
            $model = \App\CompanyInfo::with('franchisees', "vatreg", "socialMedia")->where("franchisees_id", $franchisees_id)->first();
            return view('admin.companyinfo.edit', compact('model'));
        }
    }

    public function update(Request $request) {
        try {

            $this->validate($request, [
                //'company_number' => 'required',
                //'registered_office' => 'required',
                //'phone_number' => 'required|numeric|digits_between:10,12',
                //'company_email' => 'required|email',
                //'linkedin' => 'nullable|url',
                //'instagram' => 'nullable|url',
                //'facebook' => 'nullable|url',
                //"vat_reg_date.*"    => "required",
                //"vat_de_reg_date.*"    => "required",
            ]);

            if (isSuperAdmin()) {
                if (selectedFranchisees()) {
                    $franchisees_id = selectedFranchisees();
                    $input = $request->all();

                    $vatregistration = $request->vat_reg_date;
                    $vatderegistration = $request->vat_de_reg_date;
                    
                    \App\VatReg::where("franchisees_id", $franchisees_id)->delete();

                    foreach ($vatregistration as $key => $vatregistration) {
                        if ($vatregistration && $vatderegistration[$key]) {
                            $vatregData = [
                                "franchisees_id" => $franchisees_id,
                                "vat_reg_date" => calculateMySqlDateOnly($vatregistration),
                                "vat_de_reg_date" => calculateMySqlDateOnly($vatderegistration[$key])
                            ];
                            \App\VatReg::updateOrCreate($vatregData);
                        }
                    }                    

                    \App\CompanyInfo::updateOrCreate(
                        ["franchisees_id" => $franchisees_id], $input
                    ); 

                    if($request->public_liability_insurance){
                        $public_liability_insurance = calculateMySqlDateOnly($request->public_liability_insurance);
                    }

                    if($request->employers_liability_insurance){
                        $employers_liability_insurance = calculateMySqlDateOnly($request->employers_liability_insurance);
                    }

                    \App\Franchisee::updateOrCreate( 
                        ["id" => $franchisees_id], [
                        'public_liability_insurance' => $public_liability_insurance,
                        'employers_liability_insurance' => $employers_liability_insurance,
                        'amount_cover' => $request->amount_cover,
                        ]
                    );

                    /* -------------------------------------------------------------------- */
                    $social_media_name = $request->social_media_name;
                    $social_media_link = $request->social_media_link;

                    \App\SocialMedia::where("franchisees_id", $franchisees_id)->delete();

                    foreach ($social_media_name as $key => $name) {
                        if ($name || $social_media_link[$key]) {
                            $data [] = [
                                "social_media_name" => $name,
                                "social_media_link" => $social_media_link[$key],
                                "franchisees_id" => $franchisees_id
                            ];
                        }
                    }
                    //pr($data);exit;
                    \App\SocialMedia::insert($data);

                    /* ---------------------------------------------------------------------------------------------------------------- */
                    $director_name = $request->director_name;
                    $director_email = $request->director_email;
                    $director_phone = $request->director_phone;
                    $director_job_role = $request->director_job_role;
                    $director_bio = $request->director_bio;
                    $director_image = $request->director_image;

                    $files = $request->file('director_image');

                    //pr($director_name);exit;

                    if (!empty($director_name)) {

                        foreach ($director_name as $key => $name) {

                            $director_data = array();

                            $director = \App\Director::find($key);

                            if ($director) {
                                $inputname=$director->director_image;
                            } else {

                                $inputname=null;
                            }

                            if (!empty($files[$key])) {

                                $inputname = time() . "-" . uniqid() . '.' . $files[$key]->getClientOriginalExtension();

                                $img = Image::make($files[$key]->getRealPath());
                                $img->save(public_path('admin/directors_image/' . $inputname));
                            }

                            $director_data = [
                                "director_name" => $name,
                                "director_email" => $director_email[$key],
                                "director_phone" => $director_phone[$key],
                                "director_job_role" => $director_job_role[$key],
                                "director_bio" => $director_bio[$key],
                                "franchisees_id" => $franchisees_id,
                                "director_image" => @$inputname
                            ];

                            if ($director) {
                                $director->update($director_data);
                            } else {

                                \App\Director::create($director_data);
                            }
                        }
                    }

                    /* ----------------------------------------------------------------------------------------------------- */

                    $request->session()->flash('success', 'Company Information has been successfully Updated!');

                    return redirect(route('companyinfo'));
                } else {

                    foreach ($request->data as $key => $data) {

                        \App\GeneralSetting::where('id', $key)
                                ->update(['setting_value' => $data]);
                    }
                    $request->session()->flash('success', 'Company Information has been successfully Updated!');
                    return redirect(route('companyinfo'));
                }
            } else {
                $franchisees_id = selectedFranchisees();
                $input = $request->all();

                \App\CompanyInfo::updateOrCreate(
                        ["franchisees_id" => $franchisees_id], $input
                );
                $request->session()->flash('success', 'Company Information has been successfully Updated!');
                return redirect(route('companyinfo'));
            }

            //
            return redirect(route('companyinfo'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }
    
    
    public function directorDelete($id) {
        
        $director = Director::find($id);
        
        if ($director) {
            
            $director->delete();
            
            \Session::flash('success', 'Director has been successfully deleted!');
        }
        
        return response()->json(['']);
    }

}
