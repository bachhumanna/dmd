<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FranchisorInvoicePrice;
use App\Http\Requests\InvoicePriceCreate;
use App\Http\Requests\InvoicePriceUpdate;

class FranchisorInvoicePriceController extends Controller {

    public function index(Request $request) {

        $feesPrce = \App\FranchisorInvoiceFee::sortable()->paginate(50);

        $models = FranchisorInvoicePrice::paginate(20);
        return view('admin.invoice-price.index', compact('models', 'feesPrce'));
    }

    public function create(Request $request) {

        return view('admin.invoice-price.create');
    }

    public function store(InvoicePriceCreate $request) {
        try {
            FranchisorInvoicePrice::create($request->all());
            $request->session()->flash('success', 'Franchisor Invoice Price has been successfully added!');

            return redirect(route('franchisor-invoiceprice.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {

        $model = FranchisorInvoicePrice::find($id);
        return view('admin.invoice-price.show', ['model' => $model]);
    }

    public function edit($id) {
        $model = FranchisorInvoicePrice::find($id);
        return view('admin.invoice-price.edit', compact('model'));
    }

    public function update(InvoicePriceUpdate $request, $id) {
        try {
            $model = FranchisorInvoicePrice::find($id);
            $input = $request->all();
            $model->update($input);
            $request->session()->flash('success', 'Franchisor Invoice Price has been successfully Updated!');
            return redirect(route('franchisor-invoiceprice.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function destroy($id) {
//        $request->session()->flash('error', 'Action not allow!');
//        return redirect()->back();
        $model = FranchisorInvoicePrice::findOrFail($id);
        $model->forceDelete();
        \Session::flash('success', 'Franchisor Invoice Price has been successfully deleted!');
        return redirect()->back();
    }

    public function feesCreate() {
        return view('admin.invoice-price.feecreate');
    }

    public function feeStore(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'amount' => 'required|numeric',
           // 'months' => 'required',
            'vat' => 'required|numeric',
        ]);

        try {
            $data = $request->all();
            if ($request->type == 1) {
                unset($data['months']);
            }else{
                $data['months'] = json_encode($request->months);
            }

            \App\FranchisorInvoiceFee::create($data);
            $request->session()->flash('success', 'Franchisor Invoice Fee has been successfully added!');

            return redirect(route('franchisor-invoiceprice.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function feeEdit($id) {
        $model = \App\FranchisorInvoiceFee::findOrFail($id);
        return view('admin.invoice-price.feeedit', compact('model'));
    }

    public function feeUpdate(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'amount' => 'required|numeric',
            'vat' => 'required|numeric',
//            'months' => 'required',
        ]);

        try {
            $model = \App\FranchisorInvoiceFee::findOrFail($id);
            $input = $request->all();

            if ($request->type == 1) {
                $input['months'] = '';
            }else{
                $input['months'] = json_encode($request->months);
            }
            $model->update($input);
            $request->session()->flash('success', 'Franchisor Invoice Price has been successfully Updated!');
            return redirect(route('franchisor-invoiceprice.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    function feeDelete($id){
        $model = \App\FranchisorInvoiceFee::findOrFail($id);
        $model->forceDelete();
        \Session::flash('success', 'Franchisor Invoice Fees has been successfully deleted!');
        return redirect()->back();
    }

}
