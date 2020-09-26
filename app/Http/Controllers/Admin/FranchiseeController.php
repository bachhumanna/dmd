<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Franchisee;
use App\Assumptions;
use App\VatReg;
use DB;
use Image;
use App\Http\Requests\FranchiseeCreate;
use App\Http\Requests\FranchiseeUpdate;

class FranchiseeController extends Controller {

    public function index(Request $request) {

        $query = Franchisee::fra()->sortable();


        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->email) {
            $query->where('contact_person_email', 'like', '%' . $request->email . '%');
        }
        if ($request->phone) {
            $query->where('contact_person_phone', 'like', '%' . $request->phone . '%');
        }

        $models = $query->with('vatRegdate')->orderBy('id', 'DESC')->paginate(25);
        //pr($models->toarray());exit;

        return view('admin.franchisee.index', compact('models'));
    }

    public function create(Request $request) {
        $town = \App\Town::orderBy('name')->pluck('name', 'id');
        return view('admin.franchisee.create', compact('town'));
    }

    public function store(FranchiseeCreate $request) {

        DB::beginTransaction();
        try {
            $modelAttribute = $request->all();
            $franchiseagreementimg = $request->file('franchise_agreement');
            if ($franchiseagreementimg) {
                $inputname = time() . "-" . uniqid() . '.' . $franchiseagreementimg->getClientOriginalExtension();
                $img = Image::make($franchiseagreementimg->getRealPath());
                $img->save(public_path('/images/franchisee/' . $inputname));
                $modelAttribute['franchise_agreement'] = $inputname;
            }

            $amendmentsimg = $request->file('amendments');
            if ($amendmentsimg) {
                $inputamendmentsname = time() . "-" . uniqid() . '.' . $amendmentsimg->getClientOriginalExtension();
                $img = Image::make($amendmentsimg->getRealPath());
                $img->save(public_path('/images/franchisee/' . $inputamendmentsname));
                $modelAttribute['amendments'] = $inputamendmentsname;
            }

            $franchiseeInserted = \App\Franchisee::create($modelAttribute);
            $modelAttribute['franchisees_id'] = $franchiseeInserted->id;
            \App\FranchiseesPrice::create($modelAttribute);




            //$modelAttribute['franchisees_id'] = $franchiseeInserted->id;
            //$modelAttribute['vat_reg_date'] = $request->vat_reg_date;
            //$modelAttribute['vat_de_reg_date'] = $request->vat_de_reg_date;
            //VatReg::create($modelAttribute);


            $vatregistration = $request->vat_reg_date;
            $vatderegistration = $request->vat_de_reg_date;


            foreach ($vatregistration as $key => $vatregistration) {
                if($vatregistration && $vatderegistration[$key]){
                    $vatregData = [
                        "franchisees_id" => $franchiseeInserted->id,
                        "vat_reg_date" => $vatregistration,
                        "vat_de_reg_date" => $vatderegistration[$key]
                    ];
                    \App\VatReg::create($vatregData);
                }
            }





            $modelAttribute['business_address'] = $request->address;

            \App\CompanyInfo::create($modelAttribute);
            DB::commit();
            $request->session()->flash('success', 'Franchisee has been successfully added!');
            return redirect(route('franchisee.index'));
        } catch (Exception $e) {
            DB::rollBack();

            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {
        $model = Franchisee::fra()->with("priceDetails","vatRegdate")->find($id);
        return view('admin.franchisee.show', ['model' => $model]);
    }

    public function edit($id) {

        $model = Franchisee::fra()->with("priceDetails", "companyInfo","vatRegdate")->withTrashed()->findOrFail($id);

        //pr($model->toarray());exit;

        $town = \App\Town::orderBy('name')->pluck('name', 'id');
        return view('admin.franchisee.edit', compact('model', 'town'));
    }

    public function update(FranchiseeUpdate $request, $id) {

        DB::beginTransaction();
        try {
            $modelAttribute = $request->all();
            $model = Franchisee::fra()->withTrashed()->findOrFail($id);

            $franchiseagreementimg = $request->file('franchise_agreement');
            if ($franchiseagreementimg) {
                $inputname = time() . "-" . uniqid() . '.' . $franchiseagreementimg->getClientOriginalExtension();
                $img = Image::make($franchiseagreementimg->getRealPath());
                $img->save(public_path('/images/franchisee/' . $inputname));
                $modelAttribute['franchise_agreement'] = $inputname;
            }

            $amendmentsimg = $request->file('amendments');
            if ($amendmentsimg) {
                $inputamendmentsname = time() . "-" . uniqid() . '.' . $amendmentsimg->getClientOriginalExtension();
                $img = Image::make($amendmentsimg->getRealPath());
                $img->save(public_path('/images/franchisee/' . $inputamendmentsname));
                $modelAttribute['amendments'] = $inputamendmentsname;
            }

            $model->update($modelAttribute);


            $companyInfo = \App\CompanyInfo::where("franchisees_id", $id)->first();
            $companyInfo->update($modelAttribute);





            $vatregistration = $request->vat_reg_date;
            $vatderegistration = $request->vat_de_reg_date;

            \App\VatReg::where("franchisees_id", $id)->delete();

            foreach ($vatregistration as $key => $vatregistration) {
                if($vatregistration && $vatderegistration[$key]){
                    $vatregData = [
                        "franchisees_id" => $id,
                        "vat_reg_date" => $vatregistration,
                        "vat_de_reg_date" => $vatderegistration[$key]
                    ];
                    \App\VatReg::updateOrCreate($vatregData);
                }
            }




            //$modelAttribute['vat_reg_date'] = $request->vat_reg_date;
            //$modelAttribute['vat_de_reg_date'] = $request->vat_de_reg_date;
            //$vatreg = \App\VatReg::where("franchisees_id", $id)->first();
            //$vatreg->update($modelAttribute);



            $franchiseesPrice = \App\FranchiseesPrice::where("franchisees_id", $id)->first();
            $franchiseesPrice->update($modelAttribute);

            DB::commit();

            $request->session()->flash('success', 'Franchisee has been successfully Updated!');
            return redirect(route('franchisee.index'));
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function destroy($id) {
        try {
            $model = Franchisee::withTrashed()->findOrFail($id);

            if ($model->trashed()) {
                $model->restore();
                \session()->flash('success', 'Franchisee has been successfully Restore!');
            } else {
                $model->delete();
                \session()->flash('success', 'Franchisee has been successfully Deleted!');
            }
        } catch (Exception $e) {
            \session()->flash('error', 'Oops something went wrong try again !');
        }
        return redirect()->back();
    }

//    public function destroy($id) {
//        try {
//            $model = Franchisee::withTrashed()->findOrFail($id);
//            $amodel = Assumptions::withTrashed()->where("franchisees_id",$id);
//            if ($model->trashed() && $amodel->trashed()) {
//                $model->restore();
//                $amodel->restore();
//                \session()->flash('success', 'Franchisee has been successfully Restore!');
//            } else {
//                $model->delete();
//                $amodel->delete();
//                \session()->flash('success', 'Franchisee has been successfully Deleted!');
//            }
//        } catch (Exception $e) {
//            \session()->flash('error', 'Oops something went wrong try again !');
//        }
//        return redirect()->back();
//    }
}
