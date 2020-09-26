<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FranchisorInvoiceCreate;
use Carbon\DateTime;
use DB;
use App\FranchisorInvoice;
use App\FranchisorInvoicePrice;
use PDF;
use Auth;
use App\FranchisorInvoiceFee;
use Mail;
use App\EmailTemplate;
use DbView;
use File;
use Mpdf;
use Zip;

class FranchisorInvoiceController extends Controller {

    public function index(Request $request) {
        $monthView = 0;
        if ($request->month && $request->year) {
            $monthView = 1;
            $models = FranchisorInvoice::with('franchisees', 'invoiceDetails', 'invoiceDetailsCustom')
                    ->where('invoice_for_month', $request->month)
                    ->where('invoice_for_year', $request->year)
                    ->paginate(20);

            $allFees = array();

            foreach ($models as $fee) {
                foreach ($fee->invoiceDetails as $data) {
                    $allFees[$data->fee_id] = $data->fee_type;
                }
            }
        } else {
            $models = FranchisorInvoice::select(DB::raw('sum(amount) as amount'), DB::raw('count(amount) as count'), DB::raw('sum(finalised) as finalised'), 'invoice_for_month', 'invoice_for_year')
                    ->groupBy("invoice_for_month", "invoice_for_year")
                    ->paginate(20);
        }
        return view('admin.franchisorinvoice.index', compact('models', 'monthView', 'allFees'));
    }

    public function create(Request $request) {

        return view('admin.franchisorinvoice.create');
    }

    public function store(FranchisorInvoiceCreate $request) {
        $this->validate($request, [
            'invoice_for_month' => 'required',
            'invoice_for_year' => 'required',
            'turnover' => 'required|numeric',
            'standard_fee' => 'required|numeric',
            'standard_fee' => 'required|numeric',
            'custom_entry' => "nullable|numeric"
        ]);

        DB::beginTransaction();
        try {
            $data = $request->all();

            $invoiceFees = FranchisorInvoiceFee::where('type', 1)
                    ->orWhereRaw('json_contains(months, \'["' . $request->invoice_for_month . '"]\')')
                    ->get();

            $feePrice = 0;
//            foreach ($invoiceFees as $fees) {
//                $feePrice += $fees->amount;
//            }

            $model = new FranchisorInvoice($data);
            $model->create_by = Auth::user()->id;
            $model->amount = $request->amount;

            $model->save();
            $model->invoice_no = getOrderNo($model->id, "IN");
            $model->save();


            foreach ($invoiceFees as $fee) {
                $feeModel = new \App\FranchisorInvoiceDetails();
                $feeModel->invoice_id = $model->id;
                $feeModel->fee_type = $fee->name;
                $feeModel->amount = $fee->amount;
                $feeModel->save();
            }



            $request->session()->flash('success', 'Franchisor Invoice has been successfully added!');
            DB::commit();
            return redirect(route('franchisor-invoice.index'));
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function edit(Request $request, $id) {
        $model = FranchisorInvoice::with('invoiceDetails', 'franchisees')->find($id);
        $invoiceDetails = \App\FranchisorInvoiceDetails::where('invoice_id', $model->id)
                ->where('fee_id', -1)
                ->get();
        return view('admin.franchisorinvoice.edit', compact('model', 'invoiceDetails'));
    }

    public function update(Request $request, $id) {
        $model = FranchisorInvoice::with('invoiceDetails')->find($id);


        $this->validate($request, [
            'edit_description.*' => 'required',
            'edit_quantity.*' => 'required',
            'edit_price.*' => 'required|numeric',
            'edit_vat.*' => 'required|numeric',
            'edit_amount.*' => 'required|numeric',
                ], [
            'edit_description.*' => 'Required',
            'edit_quantity.*' => 'Required',
            'edit_price.*' => 'Required',
            'edit_vat.*' => 'Required',
            'edit_amount.*' => 'Required',
        ]);


        DB::beginTransaction();
        
        try {
            
            \App\FranchisorInvoiceDetails::where('invoice_id', $model->id)
                ->where('fee_id', -1)
                ->delete();
            $customAmount = 0;
            $qnty = $request->edit_quantity;
            $price = $request->edit_price;
            $edit_vat = $request->edit_vat;
            $edit_amount = $request->edit_amount;
            
            foreach ($request->edit_description as $key => $description) {
                
                $feeModel = new \App\FranchisorInvoiceDetails();
                $feeModel->invoice_id = $model->id;
                $feeModel->fee_id = -1;
                $feeModel->fee_type = $description;
                $feeModel->qnty = $qnty[$key];
                $feeModel->price = $price[$key];
                $feeModel->vat = $edit_vat[$key];
                $amount=$feeModel->qnty * $feeModel->price;
                //$amount= vatCalculation( $amount, $feeModel->vat, true);
                $feeModel->amount = $amount;
                $feeModel->save();
                $customAmount += $edit_amount[$key];
            }




            $totalAmount = 0;
            foreach ($model->invoiceDetails as $details) {
                $totalAmount += $details->amount;
            }

            $finalamount = $model->standard_fee + $model->commission + $totalAmount + $customAmount + $model->VAT;
            
           
            //$finalamount=$finalamount+$amount+$vat;
           
            //$model->VAT= $model->VAT + $vat;
            $model->amount = $finalamount;
            
            $model->save();

            DB::commit();

            $request->session()->flash('success', 'Franchisor Invoice has been successfully added!');
            return redirect(route('franchisor-invoice.index', ['month' => $model->invoice_for_month, 'year' => $model->invoice_for_year]));
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }

        //$model->amount = $request->amount;
        //$model->comment = $request->comment;
        //$model->custom_entry = $request->custom_entry;
        //$model->save();

        return redirect(route('franchisor-invoice.index', ['month' => $model->invoice_for_month, 'year' => $model->invoice_for_year]));
        return redirect(route('franchisor-invoice.index'));
    }

    public function destroy($id) {
//        $request->session()->flash('error', 'Action not allow!');
//        return redirect()->back();
        $model = FranchisorInvoice::findOrFail($id);
        $model->forceDelete();
        \Session::flash('success', 'Franchisor Invoice has been successfully deleted!');
        return redirect()->back();
    }

    public function getInvoicePriceDetails(Request $request) {


        if (selectedFranchisees()) {
            $request->franchisees_id = selectedFranchisees();
        }

        if ($request->custom_entry) {
            if (!is_numeric($request->custom_entry)) {
                return response()->json([
                            'status' => 2,
                            'msg' => 'custom_entry not a valid nuumber.',
                ]);
            }
        }

        $checkExistingInvoice = \App\FranchisorInvoice::where('franchisees_id', $request->franchisees_id)
                ->where('invoice_for_month', $request->invoice_for_month)
                ->where('invoice_for_year', $request->invoice_for_year)
                ->first();
        if ($checkExistingInvoice) {
            return response()->json([
                        'status' => 2,
                        'msg' => 'You have already generated invoice for this month.',
            ]);
        } else {

            $dt = \Carbon\Carbon::create($request->invoice_for_year, $request->invoice_for_month, null);
            $dt = $dt->subMonth(1);
            $firstDate = $dt->startOfMonth();


            $date = $dt->toDateString();
            $d = date_parse_from_format("Y-m-d", $date);
            $previousMonth = $d["month"];
            $previousYear = $d["year"];


            $dt = \Carbon\Carbon::create($request->invoice_for_year, $request->invoice_for_month);
            $dt = $dt->subMonth(1);
            $lastDate = $dt->endOfMonth();


            if ($request->franchisees_id) {

                $bookingDetails = \App\Booking::select(DB::raw('sum(final_price) as final_price'))
                        ->where('franchisees_id', $request->franchisees_id)
                        ->where('payment_status', 1)
                        ->whereBetween('booking_time', [$firstDate, $lastDate])
                        ->first();




                if ($bookingDetails) {
                    $turnover = $bookingDetails->final_price ? $bookingDetails->final_price : 0;
                } else {
                    $turnover = 1;
                }

                $priceDetails = DB::table('franchisor_invoice_price')->whereRaw(DB::raw("$turnover BETWEEN from_turnover AND to_turnover"))->first();
                if ($priceDetails) {


                    $invoiceFees = FranchisorInvoiceFee::where('type', 1)
                            ->orWhereRaw('json_contains(months, \'["' . $request->invoice_for_month . '"]\')')
                            ->get();
                    $fee = array();
                    $feePrice = 0;
                    foreach ($invoiceFees as $fees) {
                        $fee[] = $fees->name . " " . env('CURRENCY_SYM') . $fees->amount;
                        $feePrice += $fees->amount;
                    }


                    $percentage = $priceDetails->plus_excess;
                    $base_fee = $priceDetails->base_fee;

                    $checkPreviousMonth = \App\FranchisorInvoice::where('franchisees_id', $request->franchisees_id)
                            ->where('invoice_for_month', $previousMonth)
                            ->where('invoice_for_year', $previousYear)
                            ->first();

                    //pr($checkPreviousMonth->toarray());
                    //exit;
                    // pr($priceDetails);
                    if ($checkPreviousMonth) {
                        $base_fee_of_previous_month = $checkPreviousMonth->standard_fee;
                    } else {
                        $base_fee_of_previous_month = 0;
                    }
                    // $final_invoice = $priceDetails->base_fee + (($percentage / 100) * $turnover) - $base_fee_of_previous_month;


                    $final_invoice = $priceDetails->base_fee + ((($turnover - $priceDetails->from_turnover) * $percentage) / 100);
                    $commission = ((($turnover - $priceDetails->from_turnover) * $percentage) / 100);

                    $final_invoice = $priceDetails->base_fee + $feePrice + $commission;


                    if ($request->custom_entry) {
                        $final_invoice = $final_invoice + intval($request->custom_entry);
                    }

                    $commission = number_format($commission, 2);

                    $prev_month = date("F", mktime(0, 0, 0, $previousMonth, 10));

                    $html = "<b> Total Invoice </b> : " . env('CURRENCY_SYM') . " $priceDetails->base_fee + ($turnover - $priceDetails->from_turnover) * $percentage% ) " . implode("+ ", $fee) . " <b>Total </b>=" . env('CURRENCY_SYM') . $final_invoice;
                    $html = view('admin.franchisorinvoice.pricingdetails', [
                        'base_fee' => $priceDetails->base_fee,
                        'invoiceFees' => $invoiceFees,
                        'commission' => $commission,
                        'custom_entry' => $request->custom_entry ? intval($request->custom_entry) : 0,
                        'comment' => $request->comment
                            ])->render();

                    return response()->json([
                                'status' => 1,
                                'text' => $html,
                                'turnover' => $turnover,
                                'base_fee' => $base_fee,
                                'commission' => $commission,
                                'final_invoice' => number_format($final_invoice, 2),
                                'plus_excess' => $percentage,
                                'base_fee_of_previous_month' => $base_fee_of_previous_month,
                                'prev_month' => $prev_month,
                    ]);
                }
            }
        }
    }
    
    
    
    public function generate(Request $request) {
        
        
           $checkExistingInvoice = \App\FranchisorInvoice::with('franchisees')->
                where('invoice_for_month', $request->month)
                ->where('invoice_for_year', $request->year)
                ->get();
           $name='pdf-'.$request->month."-".$request->year;
           
          if (!File::exists(public_path("/PDF/$name/"))) {
                   File::makeDirectory(public_path("/PDF/$name/"), $mode = 0777);
           }
           foreach($checkExistingInvoice as $key=>$model){
           
                    $invoiceFees = \App\FranchisorInvoiceDetails::where('invoice_id', $model->id)->get();

                    
                     $generateDayEndDetailReportPdf = \View::make('admin.franchisorinvoice.invoice', ['model' => $model, 'invoiceFees' => $invoiceFees]);
                     
                     
                      $mpdf = new \Mpdf\Mpdf([
                                'margin_top' => 0,
                                'margin_left' => 0,
                                'margin_right' => 0,
                                'mirrorMargins' => true,
                                'format' => 'A4'
                    ]);
                    
                    $mpdf->WriteHTML($generateDayEndDetailReportPdf);
                    $mpdf->Output(public_path("PDF/$name/$model->invoice_no.pdf"), 'F');

                }
                
                
                $zip = Zip::create(public_path("PDF/output/$name.zip"));
                $zip->add(public_path("PDF/$name/"), true);
                $zip->setMask(0644);
                $zip->close();
                return \Response::download(public_path("PDF/output/$name.zip"));
                \Session::flash('success', 'PDF File Has Been Successfully Downloaded !');
                return redirect()->back();
                
                
    }
    
    public function generateEmail(Request $request) {
        
         
           $checkExistingInvoice = \App\FranchisorInvoice::with('franchisees')->
                where('invoice_for_month', $request->month)
                ->where('invoice_for_year', $request->year)
                ->get();
           
           
           //pr($checkExistingInvoice);exit;
      
                $name='pdf-'.$request->month."-".$request->year;
                $fromEmail = env("APP_EMIL");
                
                if (!File::exists(public_path("/PDF/$name/"))) {
                         File::makeDirectory(public_path("/PDF/$name/"), $mode = 0777);
                 }
           
                foreach($checkExistingInvoice as $key=>$model){
            
                    $invoiceFees = \App\FranchisorInvoiceDetails::where('invoice_id', $model->id)->get();
                   
                    
                     $generateDayEndDetailReportPdf = \View::make('admin.franchisorinvoice.invoice', ['model' => $model, 'invoiceFees' => $invoiceFees]);
                     
                     
                      $mpdf = new \Mpdf\Mpdf([
                                'margin_top' => 0,
                                'margin_left' => 0,
                                'margin_right' => 0,
                                'mirrorMargins' => true,
                                'format' => 'A4'
                    ]);
                    
                    $mpdf->WriteHTML($generateDayEndDetailReportPdf);
                    $mpdf->Output(public_path("PDF/$name/$model->id.pdf"), 'F');
                    
                    
                     $template = EmailTemplate::find(1);
                    $fianlData = [
                        'name' => $name
                    ];
                    $content = DbView::make($template)->with($fianlData)->render();
                     
                    Mail::send('emails.contact', ['content' => $content], function($message) use ($model,$name,$fromEmail) {
                     $message->to($model->franchisees->contact_person_email)
                            ->from($fromEmail, env('APP_EMIL_FROM'))
                            ->subject('Invoice')
                            ->attach(public_path("PDF/$name/$model->id.pdf"), [
                                'as' => 'invoice.pdf',
                                'mime' => 'application/pdf'
                    ]);
                });

                }
                
                
                \Session::flash('success', 'Email Has Been Successfully Sent !');
                return redirect()->back()->withInput();
                
                
                
              
    }
    

    public function invoice(Request $request, $id) {

        $model = FranchisorInvoice::with('franchisees')->findOrFail($id);
        $invoiceFees = \App\FranchisorInvoiceDetails::where('invoice_id', $model->id)->get();

        $pdf = PDF::loadView('admin.franchisorinvoice.invoice', ['model' => $model, 'invoiceFees' => $invoiceFees], [], [
                    'margin_top' => 0,
                    'margin_left' => 0,
                    'margin_right' => 0,
                    'mirrorMargins' => true,
                    'format' => 'A4'
        ]);


        //return $pdf->download("invoice-" . $model->id . ".pdf");

        return $pdf->stream('document.pdf');
    }

    function createBulk(Request $request) {
        $data = [];
        $invoiceFees = false;
        if ($request->invoice_for_month && $request->invoice_for_year) {



            $checkExistingInvoice = \App\FranchisorInvoice::where('invoice_for_month', $request->invoice_for_month)
                    ->where('invoice_for_year', $request->invoice_for_year)
                    ->get();

            if (count($checkExistingInvoice)) {
                \Session::flash('error', 'Already have!');

                return redirect()->back()->withInput();
            } else {




                $dt = \Carbon\Carbon::create($request->invoice_for_year, $request->invoice_for_month, null);
                $dt = $dt->subMonth(1);
                $firstDate = $dt->startOfMonth();


                $date = $dt->toDateString();
                $d = date_parse_from_format("Y-m-d", $date);
                $previousMonth = $d["month"];
                $previousYear = $d["year"];


                $dt = \Carbon\Carbon::create($request->invoice_for_year, $request->invoice_for_month);
                $dt = $dt->subMonth(1);
                $lastDate = $dt->endOfMonth();


                $franchisee = \App\Franchisee::select('id', 'name', 'vat_reg')->get();
                $invoiceFees = FranchisorInvoiceFee::where('type', 1)
                        ->orWhereRaw('json_contains(months, \'["' . $request->invoice_for_month . '"]\')')
                        ->get();


                foreach ($franchisee as $company) {
                    $bookingDetails = \App\Booking::select(DB::raw('sum(final_price) as final_price'))
                            ->where('franchisees_id', $company->id)
                            ->where('payment_status', 1)
                            ->whereBetween('booking_time', [$firstDate, $lastDate])
                            ->first();




                    if ($bookingDetails) {
                        $turnover = $bookingDetails->final_price ? $bookingDetails->final_price : 0;
                    } else {
                        $turnover = 1;
                    }

                    $priceDetails = DB::table('franchisor_invoice_price')->whereRaw(DB::raw("$turnover BETWEEN from_turnover AND to_turnover"))->first();
                    if ($priceDetails) {



                        $fee = array();
                        $feePrice = 0;
                        $dynamicFeePriceVat = 0;
                        foreach ($invoiceFees as $fees) {
                            $fee[] = $fees->name . " " . env('CURRENCY_SYM') . $fees->amount;
                            $feePrice += $fees->amount;
                            $dynamicFeePriceVat += vatCalculation($fees->amount, $fees->vat);
                        }


                        $percentage = $priceDetails->plus_excess;
                        $base_fee = $priceDetails->base_fee;

                        $checkPreviousMonth = \App\FranchisorInvoice::where('franchisees_id', $request->franchisees_id)
                                ->where('invoice_for_month', $previousMonth)
                                ->where('invoice_for_year', $previousYear)
                                ->first();


                        $final_invoice = $priceDetails->base_fee + ((($turnover - $priceDetails->from_turnover) * $percentage) / 100);
                        $commission = ((($turnover - $priceDetails->from_turnover) * $percentage) / 100);

                        $final_invoice = $priceDetails->base_fee + $feePrice + $commission;
                        $vatPrice = 0;
                        if ($company->vat_reg) {
                            $franchiseTotalFee = $base_fee + $commission;
                            $franchiseFee = vatCalculation($franchiseTotalFee, 20, false);

                            $vatPrice = $dynamicFeePriceVat + $franchiseFee;
                        }
                        $data[] = [
                            'id' => $company->id,
                            'vat_reg' => $company->vat_reg,
                            'vat_price' => $vatPrice,
                            'name' => $company->name,
                            'turnover' => $turnover,
                            'base_fee' => $base_fee,
                            'commission' => $commission,
                            'final_invoice' => $final_invoice + $vatPrice,
                        ];
                    }
                }
            }
        }

        return view('admin.franchisorinvoice.bulk_create', compact('data', 'invoiceFees'));
    }

    function createBulkPost(Request $request) {
        $checkExistingInvoice = \App\FranchisorInvoice::
                where('invoice_for_month', $request->invoice_for_month)
                ->where('invoice_for_year', $request->invoice_for_year)
                ->count();

        if ($checkExistingInvoice) {
            \Session::flash('error', 'Already have!');
            return redirect(route('franchisor-invoice.createbulk'))->withInput();
        } else {










            DB::beginTransaction();
            try {








                $data = array();
                $dt = \Carbon\Carbon::create($request->invoice_for_year, $request->invoice_for_month, null);
                $dt = $dt->subMonth(1);
                $firstDate = $dt->startOfMonth();


                $date = $dt->toDateString();
                $d = date_parse_from_format("Y-m-d", $date);
                $previousMonth = $d["month"];
                $previousYear = $d["year"];


                $dt = \Carbon\Carbon::create($request->invoice_for_year, $request->invoice_for_month);
                $dt = $dt->subMonth(1);
                $lastDate = $dt->endOfMonth();


                //$franchisee = \App\Franchisee::select('id', 'name', 'vat_reg')->get();
                $franchisee = \App\Franchisee::get();
                $invoiceFees = FranchisorInvoiceFee::where('type', 1)
                        ->orWhereRaw('json_contains(months, \'["' . $request->invoice_for_month . '"]\')')
                        ->get();


                foreach ($franchisee as $company) {
                    $bookingDetails = \App\Booking::select(DB::raw('sum(final_price) as final_price'))
                            ->where('franchisees_id', $company->id)
                            ->where('payment_status', 1)
                            ->whereBetween('booking_time', [$firstDate, $lastDate])
                            ->first();




                    if ($bookingDetails) {
                        $turnover = $bookingDetails->final_price ? $bookingDetails->final_price : 0;
                    } else {
                        $turnover = 1;
                    }

                    $priceDetails = DB::table('franchisor_invoice_price')->whereRaw(DB::raw("$turnover BETWEEN from_turnover AND to_turnover"))->first();
                    if ($priceDetails) {



                        $fee = array();
                        $feePrice = 0;
                        $dynamicFeePriceVat = 0;
                        foreach ($invoiceFees as $fees) {
                            $fee[] = $fees->name . " " . env('CURRENCY_SYM') . $fees->amount;
                            $feePrice += $fees->amount;
                            $dynamicFeePriceVat += vatCalculation($fees->amount, $fees->vat);
                        }


                        $percentage = $priceDetails->plus_excess;
                        $base_fee = $priceDetails->base_fee;

                        $checkPreviousMonth = \App\FranchisorInvoice::where('franchisees_id', $request->franchisees_id)
                                ->where('invoice_for_month', $previousMonth)
                                ->where('invoice_for_year', $previousYear)
                                ->first();


                        $final_invoice = $priceDetails->base_fee + ((($turnover - $priceDetails->from_turnover) * $percentage) / 100);
                        $commission = ((($turnover - $priceDetails->from_turnover) * $percentage) / 100);

                        $final_invoice = $priceDetails->base_fee + $feePrice + $commission;
                        $vatPrice = 0;
                        if ($company->vat_reg) {
                            $franchiseTotalFee = $base_fee + $commission;
                            $franchiseFee = vatCalculation($franchiseTotalFee, 20, false);

                            $vatPrice = $dynamicFeePriceVat + $franchiseFee;
                        }
                        $data[] = [
                            'id' => $company->id,
                            'vat_reg' => $company->vat_reg,
                            'vat_price' => $vatPrice,
                            'name' => $company->name,
                            'turnover' => $turnover,
                            'base_fee' => $base_fee,
                            'commission' => $commission,
                            'final_invoice' => $final_invoice + $vatPrice,
                        ];
                    }
                }
























                foreach ($data as $invoiceData) {
                    $dataInsert = array(
                        "franchisees_id" => $invoiceData['id'],
                        "standard_fee" => $invoiceData['base_fee'],
                        "turnover" => $invoiceData['turnover'],
                        "invoice_for_month" => $request->invoice_for_month,
                        "invoice_for_year" => $request->invoice_for_year,
                        "commission" => $invoiceData['commission'],
                        "amount" => $invoiceData['final_invoice'],
                        'VAT' => $invoiceData['vat_price']
                    );

                    $model = new FranchisorInvoice($dataInsert);
                    $model->create_by = Auth::user()->id;

                    $model->save();
                    $model->invoice_no = getOrderNo($model->id, "IN");
                    $model->save();

                    $invoiceFeesModel = FranchisorInvoiceFee::where('type', 1)
                            ->orWhereRaw('json_contains(months, \'["' . $request->invoice_for_month . '"]\')')
                            ->get();


                    foreach ($invoiceFeesModel as $f) {
                        $feeModel = new \App\FranchisorInvoiceDetails();
                        $feeModel->invoice_id = $model->id;
                        $feeModel->fee_type = $f->name;
                        $feeModel->fee_id = $f->id;
                        $feeModel->vat = $f->vat;
                        $feeModel->amount = $f->amount;
                        $feeModel->price = $f->amount;
                        $feeModel->save();
                    }
                }
                DB::commit();

                $request->session()->flash('success', 'Franchisor Invoice has been successfully added!');
                return redirect(route('franchisor-invoice.index', ['month' => $request->invoice_for_month, 'year' => $request->invoice_for_year]));
                //return redirect(route('franchisor-invoice.index'));
            } catch (Exception $e) {
                DB::rollBack();
                $request->session()->flash('error', 'Oops something went wrong try again !');
            }
        }
    }

    function createBulkPost_old(Request $request) {
        $checkExistingInvoice = \App\FranchisorInvoice::
                where('invoice_for_month', $request->invoice_for_month)
                ->where('invoice_for_year', $request->invoice_for_year)
                ->count();

        if ($checkExistingInvoice) {
            \Session::flash('error', 'Already have!');
            return redirect(route('franchisor-invoice.createbulk'))->withInput();
        } else {
            $turnover = $request->turnover;
            $base_fee = $request->base_fee;
            $commission = $request->commission;
            $comment = $request->comment;
            $fee = $request->fee;
            $extra_fee = $request->extra_fee;
            $total = $request->total;
            $vat = $request->vat;
            DB::beginTransaction();
            try {
                foreach ($turnover as $key => $tur) {
                    $base = $base_fee[$key];
                    $comm = $commission[$key];
                    $invoiceComment = $comment[$key];
                    $invoceFee = $fee[$key];
                    $extraCharge = $extra_fee[$key];
                    $totalInvoice = $total[$key];
                    $vatPrice = isset($vat[$key]) ? $vat[$key] : 0;
                    $data = array(
                        "franchisees_id" => $key,
                        "standard_fee" => $base,
                        "turnover" => $tur,
                        "invoice_for_month" => $request->invoice_for_month,
                        "invoice_for_year" => $request->invoice_for_year,
                        "commission" => $comm,
                        "comment" => $invoiceComment,
                        "custom_entry" => $extraCharge,
                        "amount" => $totalInvoice,
                        'VAT' => $vatPrice
                    );

                    $model = new FranchisorInvoice($data);
                    $model->create_by = Auth::user()->id;

                    $model->save();
                    $model->invoice_no = getOrderNo($model->id, "IN");
                    $model->save();

                    $invoiceFeesModel = FranchisorInvoiceFee::where('type', 1)
                            ->orWhereRaw('json_contains(months, \'["' . $request->invoice_for_month . '"]\')')
                            ->get();


                    foreach ($invoiceFeesModel as $f) {
                        $feeModel = new \App\FranchisorInvoiceDetails();
                        $feeModel->invoice_id = $model->id;
                        $feeModel->fee_type = $f->name;
                        $feeModel->fee_id = $f->id;
                        $feeModel->vat = $f->vat;
                        $feeModel->amount = $f->amount;
                        $feeModel->save();
                    }
                }



                DB::commit();

                if ($request->sendMail) {

                    $franchisorInvoice = FranchisorInvoice::with('franchisees')
                            ->where('invoice_for_month', $request->invoice_for_month)
                            ->where('invoice_for_year', $request->invoice_for_year)
                            ->get();

                    foreach ($franchisorInvoice as $model) {

                        $email = $model->franchisees->contact_person_email;
                        $name = $model->franchisees->contact_person_name;
                        $invoiceFees = \App\FranchisorInvoiceDetails::where('invoice_id', $model->id)->get();

                        $template = EmailTemplate::find(1);
                        $fianlData = [
                            'name' => $name
                        ];
                        $content = DbView::make($template)->with($fianlData)->render();

                        $pdfFileName = time() . $model->id . '.pdf';
                        $pdf = PDF::loadView('admin.franchisorinvoice.invoice', ['model' => $model, 'invoiceFees' => $invoiceFees], [], [
                                    'margin_top' => 0,
                                    'margin_left' => 0,
                                    'margin_right' => 0,
                                    'mirrorMargins' => true,
                                    'format' => 'A4'
                        ]);
                        $pdf->save(public_path('invoice/' . $pdfFileName));

                        Mail::send('emails.contact', ['content' => $content], function ($message) use ($template, $email, $name, $pdfFileName) {
                            $message->to($email, $name)
                                    ->attach(public_path('invoice/' . $pdfFileName), [
                                        'as' => 'invoice.pdf',
                                        'mime' => 'application/pdf',
                                    ])
                                    ->subject($template->subject)
                                    ->from($template->from_email, $template->from_name);
                        });
                    }
                }


                $request->session()->flash('success', 'Franchisor Invoice has been successfully added!');
                return redirect(route('franchisor-invoice.index'));
            } catch (Exception $e) {
                DB::rollBack();
                $request->session()->flash('error', 'Oops something went wrong try again !');
            }
        }
    }

    public function finalised(Request $request) {

        $model = FranchisorInvoice::where('invoice_for_month', $request->invoice_for_month)
                        ->where('invoice_for_year', $request->invoice_for_year)->update(['finalised'=>1]);
        if ($model) {
            $request->session()->flash('success', 'Franchisor Invoice has been successfully finalised!');
        } else {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }

        return redirect(route('franchisor-invoice.index', ['month' => $request->invoice_for_month, 'year' => $request->invoice_for_year]));
    }

}
