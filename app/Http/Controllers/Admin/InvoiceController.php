<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Invoice;
use App\Booking;
use PDF;
use Carbon\Carbon;
use Mail;
use DB;
use DbView;
use App\BookingInvoiceOverride;
use App\InvoiceDetails;
use App\PartPayment;

class InvoiceController extends Controller {

    public function __construct() {
        $this->middleware('bookingAllow', ['only' => ['create', 'store']]);
    }

    public function uninvoiced(Request $request) {
        
        $uninvoiced = $request->uninvoiced;

        $query = Booking::Franchisee()->sortable();

        if ($request->name) {
            $query->whereHas("client", function($q) use($request) {
                if ($request->name) {
                    $q->where('firstname', 'LIKE', '%' . $request->name . '%')
                            ->orWhere('surname', 'LIKE', '%' . $request->name . '%');
                }
            });
        }
        if ($request->payment_mode) {
            $query->where('payment_mode', $request->payment_mode);
        }

        $firstDateCurrent = new Carbon('first day of this month');
        //pr($firstDateCurrent);
        //die();
        $lastDateCurrent = new Carbon('last day of this month');


        $currentMonthRevenue = \App\Booking::Franchisee()
                ->where('payment_status', 1)
                ->whereBetween('booking_time', [$firstDateCurrent, $lastDateCurrent])
                ->where('trip_status', 2)
                ->sum('invoice_price');

        $firstDate = new Carbon('first day of last month');
        $lastDate = new Carbon('last day of last month');

        $previousMonthRevenue = \App\Booking::Franchisee()
                ->where('payment_status', 1)
                ->whereBetween('booking_time', [$firstDate, $lastDate])
                ->where('trip_status', 2)
                ->sum('invoice_price');


        $unpaidbookingCount = $this->unpaidBookingCount();

        $finalinvoiceprice = \App\Booking::Franchisee()->where('payment_status', 0)->where('trip_status', 2)->sum('invoice_price');

        $unpaidmodels = $query->with('pickupLocation', 'dropLocation', 'client')
                ->where('payment_status', 0)
                ->whereIn('trip_status', [2,4])
                ->whereNull('invoiced')
                ->where('cancel_booking_deleted', 0)
                ->latest()
                ->sortable()
                ->paginate(20);
        return view('admin.invoice.uninvoiced', compact('unpaidmodels', 'unpaidbookingCount', 'finalinvoiceprice', 'uninvoiced', 'previousMonthRevenue', 'currentMonthRevenue'));
    }

    public function index(Request $request) {

        $firstDateCurrent = new Carbon('first day of this month');
        $lastDateCurrent = new Carbon('last day of this month');

        $currentMonthRevenue = \App\Booking::Franchisee()
                ->where('payment_status', 1)
                ->whereBetween('booking_time', [$firstDateCurrent, $lastDateCurrent])
                ->where('trip_status', 2)
                ->sum('invoice_price');

        $firstDate = new Carbon('first day of last month');
        $lastDate = new Carbon('last day of last month');

        $previousMonthRevenue = \App\Booking::Franchisee()
                ->where('payment_status', 1)
                ->whereBetween('booking_time', [$firstDate, $lastDate])
                ->where('trip_status', 2)
                ->sum('final_price');

        $unpaidbookingCount = $this->unpaidBookingCount();
        $finalinvoiceprice = \App\Booking::Franchisee()->where('payment_status', 0)->where('trip_status', 2)->sum('invoice_price');


        $query = BookingInvoiceOverride::Franchisee()->sortable();        

        if ($request->name) {
            $query->whereHas("client", function($q) use($request) {
                if ($request->name) {
                    $q->where('firstname', 'LIKE', '%' . $request->name . '%')
                            ->orWhere('surname', 'LIKE', '%' . $request->name . '%');
                }
            });
        }
        if ($request->group_invoice_id) {
            $query->where('id', $request->group_invoice_id)->orWhere('invoice_number', 'LIKE', '%' . $request->group_invoice_id . '%');
        }

        $unpaidmodels = $query->where('payment_status', 0)->where('total_amount','>', 0)
               // ->where('outstanding_amount', '!=', 0)
                ->latest()
                ->paginate(20);

        //pr($unpaidmodels->toarray());exit;
        
        $searchable_name = ($request->name) ? $request->name : '';
        $searchable_invoice_id = ($request->group_invoice_id) ? $request->group_invoice_id : '';

        return view('admin.invoice.index', compact('unpaidmodels', 'unpaidbookingCount', 'finalinvoiceprice', 'uninvoiced', 'previousMonthRevenue', 'currentMonthRevenue', 'searchable_name', 'searchable_invoice_id'));
    }

    public function paidInvoice(Request $request) {
        $query = Booking::Franchisee();

        if ($request->archive) {
            $query->onlyTrashed();
        }

        if ($request->phone || $request->name) {
            $query->whereHas("client", function($q) use($request) {
                if ($request->phone) {
                    $q->where('phone', 'LIKE', '%' . $request->phone . '%');
                }
                if ($request->name) {
                    $q->where('firstname', 'LIKE', '%' . $request->name . '%')
                            ->orWhere('surname', 'LIKE', '%' . $request->name . '%');
                }
            });
        }
        if ($request->booking_no) {
            $query->where('group_invoice_id', $request->booking_no);
        }

        $modelquery = $query->select(DB::raw('max(payment_date) as payment_date'), DB::raw('sum(invoice_price) as final_price'), DB::raw('sum(total_duration)as total_duration'), DB::raw('count(*) as count'), 'group_invoice_id', 'client_id')
                ->with('client')
                ->where('payment_status', 1)
                ->where('trip_status', 2)
                ->groupBy('group_invoice_id');

//        ----------pdf start------
        if ($request->downloadpdf) {
            $models = $modelquery->get();
            $pdf = PDF::loadView('admin.invoice.pdf-paidinvoice', ['models' => $models], [], [
                        'margin_top' => 0,
                        'margin_left' => 0,
                        'margin_right' => 0,
                        'mirrorMargins' => true,
                        'format' => 'A4'
            ]);

            return $pdf->download("document.pdf");
        }
        //----------pdf end------ //
        //---------csv start------ //
        if ($request->downloadcsv) {
            $model = $modelquery->get();

            $filename = "paidinvoice.csv";
            $fp = fopen('php://output', 'w');
            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename=' . $filename);
            $header[0] = "Invoice ID#";
            $header[4] = "Client Name";
            $header[1] = "No of Booking";
            $header[2] = "Totalprice";
            $header[3] = "TotalTime";

            $header[5] = "Phone";

            fputcsv($fp, $header);

            $data = array();
            foreach ($model as $key => $val) {
                $data['group_invoice_id'] = $val->group_invoice_id;
                $data['name'] = $val->client->name;
                $data['count'] = $val->count;
                $data['final_price'] = $val->final_price;
                $data['total_duration'] = $val->total_duration;

                $data['phone'] = $val->client->phone;


                fputcsv($fp, $data);
            }
            exit();
        }

        // ---------csv end------ //

        $query = BookingInvoiceOverride::Franchisee()->sortable();

        if ($request->phone || $request->name) {
            $query->whereHas("client", function($q) use($request) {
                if ($request->phone) {
                    $q->where('phone', 'LIKE', '%' . $request->phone . '%');
                }
                if ($request->name) {
                    $q->where('firstname', 'LIKE', '%' . $request->name . '%')
                            ->orWhere('surname', 'LIKE', '%' . $request->name . '%');
                }
            });
        }
        if ($request->group_invoice_id) {
            $query->where('id', $request->group_invoice_id);
        }

        $models = $query->where('payment_status', 1)
                ->latest()

                ->paginate(20);

        //$models = $modelquery->paginate(25);
        //pr($models);
        //die();
        return view('admin.invoice.paid', compact('models'));
    }

    public function create(Request $request) {
        return view('admin.invoice.create');
    }

    public function store(Request $request) {
        try {
            $message = [
                'amount_gbp.*' => 'please enter valid amount',
            ];
            $this->validate($request, [
                'invoice_number' => 'required',
                'reference' => 'required',
                'description' => 'required',
                'quantity' => 'required|numeric',
                'unit_price' => 'required|numeric',
                'amount_gbp' => 'required|numeric',
                'name' => 'required',
                'street' => 'required',
                'city' => 'required',
                'postcode' => 'required',
                'country' => 'required',
                    ], $message);

            $model = new Invoice($request->all());
            $model->create_by = Auth::user()->id;
            if (isSuperAdmin()) {
                $model->franchisees_id = selectedFranchisees();
            } else {
                $model->franchisees_id = Auth::user()->franchisees_id;
            }
            $model->save();


            $request->session()->flash('success', 'Invoice has been successfully added!');

            return redirect(route('invoice.show', $model->id));
            //return redirect(route('invoice.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {

        $model = Booking::with('driver.user', 'client')->findOrFail($id);

        if ($model->AllowDriverChage) {
            $drivers = getDriverForBooking($model);
        } else {
            $drivers = false;
        }

        return view('admin.invoice.show', ['model' => $model, 'drivers' => $drivers]);
    }

    public function edit($id) {

        $model = Booking::with('invoice')->find($id);

        return view('admin.invoice.edit', compact('model'));
    }

    public function update(Request $request, $id) {


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
            $priceWithoutVat = 0;
            $model = Booking::findOrFail($id);
            \App\InvoiceDetails::where('booking_id', $model->id)->delete();
            $customAmount = 0;
            $qnty = $request->edit_quantity;
            $price = $request->edit_price;
            $edit_vat = $request->edit_vat;
            $edit_amount = $request->edit_amount;
            foreach ($request->edit_description as $key => $description) {
                if ($description) {
                    $priceWithoutVat += ($qnty[$key] * $price[$key]);

                    $feeModel = new \App\InvoiceDetails();
                    $feeModel->booking_id = $model->id;
                    $feeModel->comment = $description;
                    $feeModel->qnty = $qnty[$key];
                    $feeModel->price = $price[$key];
                    $feeModel->vat = $edit_vat[$key];
                    // $feeModel->amount = $edit_amount[$key];
                    $feeModel->amount = $price[$key] * $qnty[$key];
                    $feeModel->save();
                    $customAmount += $edit_amount[$key];
                }
            }

            //$finalamount = vatCalculation($model->final_price, 20, true) + $customAmount;
            $finalamount = $model->final_price + $customAmount;
            $model->invoice_price = $finalamount;
            $model->price_without_vat = $model->final_price + $priceWithoutVat;

            $bookingPrice = 0;
            if ($model->vat_registered) {
                $bookingPrice = vatCalculation($model->final_price, 20);
            }

            $model->price_with_vat = $model->final_price + $customAmount + $bookingPrice;
            $model->save();

            DB::commit();

            $request->session()->flash('success', 'Invoice has been successfully Updated!');
            return redirect(route('invoice.uninvoiced'));
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }


        return redirect(route('invoice.edit', $model->id));








//        $message = [
//            'amount_gbp.*' => 'please enter valid amount',
//        ];
//        $this->validate($request, [
//            'invoice_number' => 'required',
//            'reference' => 'required',
//            'description' => 'required',
//            'quantity' => 'required|numeric',
//            'unit_price' => 'required|numeric',
//            'amount_gbp' => 'required|numeric',
//            'name' => 'required',
//            'street' => 'required',
//            'city' => 'required',
//            'postcode' => 'required',
//            'country' => 'required',
//                ], $message);


        try {
            $bookingModel = Booking::findOrFail($id);
            $model = \App\InvoiceDetails::where('booking_id', $id)->delete();


            if ($request->custom_entry) {
                $invoice = new \App\InvoiceDetails();
                $invoice->booking_id = $bookingModel->id;
                $invoice->comment = $request->comment;
                $invoice->amount = $request->custom_entry;
                $invoice->save();
            }
            $request->session()->flash('success', 'Invoice has been successfully Updated!');
            return redirect(route('invoice.edit', $bookingModel->id));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function destroy($id, Request $request) {
       /* $invoice = Invoice::findOrFail($id);
        $invoice->forceDelete();
        \Session::flash('success', 'Invoice has been successfully deleted!');
        return redirect()->back();*/
        
        try {
            $bookingModel = Booking::findOrFail($id);            
            
            $bookingModel->cancel_booking_deleted = 1;
            $bookingModel->cancel_booking_deleted_at = date('Y-m-d H:i');
            
            $bookingModel->save();
            
            $request->session()->flash('success', 'Invoice has been successfully deleted!');
            
            return redirect()->back();
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function preview($id) {
        $model = Booking::with('client', 'pickupLocation', 'franchisees', 'companyInfo')->findOrFail($id);
//        pr($model->toArray());
//        return;

        $pdf = PDF::loadView('admin.invoice.invoice-user-single', ['model' => $model], [], [
                    'margin_top' => 0,
                    'margin_left' => 0,
                    'margin_right' => 0,
                    'mirrorMargins' => true,
                    'format' => 'A4'
        ]);
        return $pdf->stream('document.pdf');
    }

    public function groupPreview($id) {

        $bookingDetails = Booking::with('franchisees', 'companyInfo', 'invoiceOverride')
                ->where('group_invoice_id', $id)
                ->where('payment_status', 0)
                //->whereIn('trip_status', [2,4])
                ->where('invoiced', 1)
                ->first();
        $model = Booking::with('client', 'pickupLocation')
                ->where('group_invoice_id', $id)
                ->where('payment_status', 0)
                //->whereIn('trip_status', [2,4])
                ->where('invoiced', 1)
                //->groupBy('group_invoice_id')
                ->get();
//        pr($bookingDetails->toarray());
//        exit;
        
        $partPayments = PartPayment::where('invoice_id', $id)->get();

        $pdf = PDF::loadView('admin.invoice.invoice-group-preview-partpayment', ['model' => $model, 'bookingDetails' => $bookingDetails, 'partPayments' => $partPayments], [], [
                    'margin_top' => 0,
                    'margin_left' => 0,
                    'margin_right' => 0,
                    'mirrorMargins' => true,
                    'format' => 'A4'
        ]);
        return $pdf->stream('document.pdf');
    }

    public function groupInvoice(Request $request) {
        if ($request->get('serialize')) {
            $this->validate($request, [
                'booking_ids' => 'required',
            ]);
            $booking_ids = $request->booking_ids;

            DB::beginTransaction();
            try {

                $bookingModel = Booking::whereIn('id', $booking_ids)->first();
                $totalAmount = 0;
                $invoiceId = getAutoGeneratedGroupInvoiceId();

                $invoiceModel = BookingInvoiceOverride::create([
                            'client_id' => $bookingModel->client_id,
                            'franchisees_id' => $bookingModel->franchisees_id,
                            'booking_count' => Booking::whereIn('id', $booking_ids)->count(),
                            'total_amount' => $totalAmount,
                            "outstanding_amount" => $totalAmount,
                            'invoice_date' => \Carbon\Carbon::now(),
                            'invoice_number' => "IN " . $invoiceId,
                            'invoice_id' => $invoiceId,
                            'user_id' => Auth::user()->id
                ]);


                $this->updateTotlaAmount($booking_ids);

                Booking::whereIn('id', $booking_ids)
                        ->update([
                            'invoiced' => 1,
                            'invoice_date' => \Carbon\Carbon::now(),
                            'group_invoice_id' => $invoiceModel->id
                ]);


                $totalAmount = Booking::whereIn('id', $booking_ids)->sum('invoice_price');
                $advanceAmount = Booking::whereIn('id', $booking_ids)->sum('advance_payment_amount');

                $invoiceModel->total_amount = $totalAmount;
                $invoiceModel->outstanding_amount = ($totalAmount - $advanceAmount);
                $invoiceModel->save();


                DB::commit();
                $request->session()->flash('success', 'Invoice has been successfully Finalized!');
                return redirect(route('invoice.uninvoiced'));
            } catch (Exception $e) {
                DB::rollBack();
                $request->session()->flash('error', 'Oops something went wrong try again !');
                return redirect()->back()->withInput();
            }
        } else if ($request->get('group_preview')) {
            
            $this->validate($request, [
                'booking_ids' => 'required',
            ]);

            $booking_ids = $request->booking_ids;
            asort($booking_ids);            

            $group_ids = '';
            if($booking_ids){
                $group_ids = implode("-",$booking_ids);
            }            

            $model = Booking::with('client', 'pickupLocation', 'franchisees')
                    ->whereIn('id', $booking_ids)
                    // ->where('payment_status', 0)
                    // ->where('trip_status', 2)
                    ->get();
            $bookingDetails = Booking::with('client', 'pickupLocation', 'franchisees')
                    ->whereIn('id', $booking_ids)
                    ->first();
            
            // generate invoice before finalize
            //BookingInvoiceOverride::where('total_amount', '<=', 0)->delete();

            $bookingModel = Booking::whereIn('id', $booking_ids)->first();
            $totalAmount = 0;
            $invoiceId = getAutoGeneratedGroupInvoiceId();           
            
            
            if(BookingInvoiceOverride::where('booking_id', $group_ids)->count() <= 0){
                $invoiceModel = BookingInvoiceOverride::create([
                    'booking_id' => $group_ids,
                    'client_id' => 0,//$bookingModel->client_id,
                    'franchisees_id' => 0, //$bookingModel->franchisees_id,
                    'booking_count' => 0, //Booking::whereIn('id', $booking_ids)->count(),
                    'total_amount' => $totalAmount,
                    "outstanding_amount" => $totalAmount,
                    'invoice_id' => $invoiceId,                    
                    'invoice_date' => date("Y-m-d"),
                    'invoice_number' => "IN " . $invoiceId,                   
                    'user_id' => Auth::user()->id
                    ]
                );
            }else{
                $invoiceModel = BookingInvoiceOverride::where('booking_id', $group_ids)->first();    
            }

            return view('admin.invoice.invoice-group-preview-edit', compact('model', 'bookingDetails', 'booking_ids', 'invoiceModel'));

            $pdf = PDF::loadView('admin.invoice.invoice-group-preview', ['model' => $model, 'bookingDetails' => $bookingDetails, 'invoiceModel' => $invoiceModel], [], [
                        'margin_top' => 0,
                        'margin_left' => 0,
                        'margin_right' => 0,
                        'mirrorMargins' => true,
                        'format' => 'A4'
            ]);

            //Booking::whereIn('id', $booking_ids)->update(['invoiced'=>1]);
            //$request->session()->flash('success', 'Invoice has been successfully Finalized!');
            //return redirect(route('invoice.uninvoiced'));

            return $pdf->stream('document.pdf');
        }else if ($request->get('export')){

            /*$model = DB::table('booking_invoice_override')
                    ->select('booking_invoice_override.id', 'booking_invoice_override.outstanding_amount', 'booking_invoice_override.due_date', 'booking_invoice_override.booking_count', 'booking_invoice_override.invoice_date', 'client.firstname', 'client.surname', 'client.address', 'booking.invoice_descriptio', DB::raw('sum(price_with_vat)as price_with_vat'), DB::raw('sum(price_without_vat) as price_without_vat'))
                    ->join('client', 'booking_invoice_override.client_id', '=', 'client.id')
                    ->join('booking', 'booking_invoice_override.id', '=', 'booking.group_invoice_id')
                    ->where('booking_invoice_override.payment_status',0)
                    ->where('booking_invoice_override.franchisees_id', session()->get('selectedFranchisees'))
                    ->groupBy('booking_invoice_override.id')
                    ->get(); */
            
            $query = DB::table('booking_invoice_override')
                    ->select('booking_invoice_override.id', 'booking_invoice_override.outstanding_amount', 'booking_invoice_override.due_date', 'booking_invoice_override.booking_count', 'booking_invoice_override.invoice_date', 'client.firstname', 'client.surname', 'client.address', 'booking.invoice_descriptio', DB::raw('sum(price_with_vat)as price_with_vat'), DB::raw('sum(price_without_vat) as price_without_vat'))
                    ->join('client', 'booking_invoice_override.client_id', '=', 'client.id')                    
                    ->join('booking', 'booking_invoice_override.id', '=', 'booking.group_invoice_id')
                    ->where('booking_invoice_override.payment_status',0)
                    ->where('booking_invoice_override.total_amount','>', 0)
                    ->where('booking_invoice_override.franchisees_id', session()->get('selectedFranchisees'));
                    if ($request->searchable_name) {
                        $query->where('client.firstname', 'LIKE', '%' . $request->searchable_name . '%')
                                ->orWhere('client.surname', 'LIKE', '%' . $request->searchable_name . '%');
                        
                    }
                    if ($request->searchable_invoice_id) {
                        $query->where('booking_invoice_override.id', $request->searchable_invoice_id)
                                ->orWhere('booking_invoice_override.invoice_number', 'LIKE', '%' . $request->searchable_invoice_id . '%');
                    }
                    $query->groupBy('booking_invoice_override.id');
            $model = $query->get();

            //pr($model->toarray());
            //echo "xxxx".$request->searchable_name;
            //exit;

            $filename = date('Y-m-d')."_booking.csv";

            $fp = fopen('php://output', 'w');

            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename=' . $filename);

            $header[1] = "Name";
            $header[2] = "Address";
            $header[3] = "Amount of Invoice (without VAT)";
            $header[4] = "Amount of invoive with VAT (if applicable)";
            $header[5] = "VAT Amount";
            $header[6] = "VAT %";
            $header[7] = "Invoice description";
            $header[8] = "Invoice date";
            $header[9] = "Due date";
            $header[10] = "Outstanding Amount";
            $header[11] = "No. of booking";

            fputcsv($fp, $header);

            $data = array();

            foreach ($model as $key => $val) {

                $vat_amount = number_format($val->price_with_vat - $val->price_without_vat, 2);

                @$data['name'] = $val->firstname . ' ' . $val->surname;
                @$data['address'] = $val->address;
                @$data['price_without_vat'] = $val->price_without_vat;
                @$data['price_with_vat'] = $val->price_with_vat;
                @$data['vat_amount'] = $vat_amount;
                @$data['vat_percentage'] = ($vat_amount != 0 ? env('VAT_PERCENTAGE') : 0);
                @$data['invoice_description'] = $val->invoice_descriptio;
                @$data['invoice_date'] = showDate($val->invoice_date);
                @$data['due_date'] = showDate($val->due_date);
                @$data['outstanding_amount'] = $val->outstanding_amount;
                @$data['booking_count'] = $val->booking_count;

                //pr($data);exit;

                fputcsv($fp, $data);
            }

            die();
        }else if ($request->get('export-all-invoice')){

            $model = DB::table('booking_invoice_override')
                    ->select('booking_invoice_override.id', 'booking_invoice_override.outstanding_amount', 'booking_invoice_override.due_date', 'booking_invoice_override.booking_count', 'booking_invoice_override.invoice_number','booking_invoice_override.invoice_date', 'booking_invoice_override.payment_status' ,'client.firstname', 'client.surname', 'client.address', 'booking.invoice_descriptio', DB::raw('sum(price_with_vat)as price_with_vat'), DB::raw('sum(price_without_vat) as price_without_vat'))
                    ->join('client', 'booking_invoice_override.client_id', '=', 'client.id')
                    ->join('booking', 'booking_invoice_override.id', '=', 'booking.group_invoice_id')
                    //->where('booking_invoice_override.payment_status',0)
                    ->where('booking_invoice_override.total_amount','>', 0)
                    ->where('booking_invoice_override.franchisees_id', session()->get('selectedFranchisees'))
                    ->groupBy('booking_invoice_override.id')
                    ->get();            
            

            //pr($model->toarray());            
            //exit;

            $filename = date('Y-m-d')."_all_invoice.csv";

            $fp = fopen('php://output', 'w');

            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename=' . $filename);

            $header[1] = "Name";
            $header[2] = "Address";
            $header[3] = "Amount of Invoice (without VAT)";
            $header[4] = "Amount of invoive with VAT (if applicable)";
            $header[5] = "VAT Amount";
            $header[6] = "VAT %";
            $header[7] = "Invoice No";
            $header[8] = "Invoice Description";
            $header[9] = "Invoice Date";
            $header[10] = "Due Date";
            $header[11] = "Outstanding Amount";
            $header[12] = "No. of booking";
            $header[13] = "Payment Status";

            fputcsv($fp, $header);

            $data = array();

            foreach ($model as $key => $val) {

                $vat_amount = number_format($val->price_with_vat - $val->price_without_vat, 2);

                @$data['name'] = $val->firstname . ' ' . $val->surname;
                @$data['address'] = $val->address;
                @$data['price_without_vat'] = $val->price_without_vat;
                @$data['price_with_vat'] = $val->price_with_vat;
                @$data['vat_amount'] = $vat_amount;
                @$data['vat_percentage'] = ($vat_amount != 0 ? env('VAT_PERCENTAGE') : 0);
                @$data['invoice_number'] = $val->invoice_number;
                @$data['invoice_description'] = $val->invoice_descriptio;
                @$data['invoice_date'] = showDate($val->invoice_date);
                @$data['due_date'] = showDate($val->due_date);
                @$data['outstanding_amount'] = $val->outstanding_amount;
                @$data['booking_count'] = $val->booking_count;
                @$data['payment_status'] = ($val->payment_status > 0) ? 'Paid' : 'Unpaid';

                //pr($data);exit;

                fputcsv($fp, $data);
            }

            die();
        }
    }

    public function downloada($id) {
        $model = Invoice::with('franchisees')->findOrFail($id);
        $pdf = PDF::loadView('admin.invoice.invoice', ['model' => $model], [], [
                    'margin_top' => 0,
                    'margin_left' => 0,
                    'margin_right' => 0,
                    'mirrorMargins' => true,
                    'format' => 'A4'
        ]);

        return $pdf->download($model->order_id . ".pdf");
    }

    public function markPaid($id) {
        $model = Invoice::findOrFail($id);
        $model->mark_as_paid_by = Auth::user()->id;
        $model->save();
        \Session::flash('success', 'Invoice has been successfully Mark as paid!');
        return redirect()->back();
    }

    private function unpaidBookingCount() {
        $franchisees = session()->get('selectedFranchisees');
        $query = \App\Booking::where('trip_status', 2)->where('payment_status', 0);
        if ($franchisees) {
            $query->where('franchisees_id', $franchisees);
        }
        return $query->count();
    }

    public function invoice($id) {

        //$model = Booking::with('client', 'pickupLocation', 'franchisees', 'invoice')->findOrFail($id);

        $bookingDetails = Booking::with('franchisees')
                ->where('group_invoice_id', $id)
                //->where('trip_status', 2)
                ->where('invoiced', 1)
                ->first();

        $model = Booking::with('client', 'pickupLocation')
                ->where('group_invoice_id', $id)
                //->where('trip_status', 2)
                ->where('invoiced', 1)
                ->get();
        
        $partPayments = PartPayment::where('invoice_id', $id)->get();
        
        $pdf = PDF::loadView('admin.invoice.invoice-user-part-payments', ['model' => $model, 'bookingDetails' => $bookingDetails, 'partPayments' => $partPayments], [], [
                    'margin_top' => 0,
                    'margin_left' => 0,
                    'margin_right' => 0,
                    'mirrorMargins' => true,
                    'format' => 'A4'
        ]);

        //------ update invoice override table for downloading invoice ------//        
        /*$invoice_override = BookingInvoiceOverride::find($id);
        // set        
        $invoice_override->comment = 'Download :'. date('m/d/Y');
        // update
        $invoice_override->save();*/


        return $pdf->download($id . ".pdf");
        return $pdf->download("invoice.pdf");

        return $pdf->stream('document.pdf');
    }

    public function invoiceView($id) {

        //$model = Booking::with('client', 'pickupLocation', 'franchisees', 'invoice')->findOrFail($id);

        $model = Booking::with('client', 'pickupLocation', 'franchisees')
                ->where('group_invoice_id', $id)
                //->where('payment_status', 0)
                //->where('trip_status', 2)
                ->where('invoiced', 1)
                //->groupBy('group_invoice_id')
                ->get();


        // $model->invoiced = 1;
        // $model->save();
        $pdf = PDF::loadView('admin.invoice.invoice-user', ['model' => $model], [], [
                    'margin_top' => 0,
                    'margin_left' => 0,
                    'margin_right' => 0,
                    'mirrorMargins' => true,
                    'format' => 'A4'
        ]);


        return $pdf->download($id . ".pdf");
        //return $pdf->download("invoice.pdf");
        //return $pdf->stream('document.pdf');
    }

    public function finalized(Request $request, $id) {

        $model = Booking::findOrFail($id);
        $model->invoiced = 1;
        //$model->invoice_date = \Carbon\Carbon::now();
        $model->save();
        $request->session()->flash('success', 'Invoice has been successfully Finalized!');
        return redirect(route('invoice.uninvoiced'));
    }

    public function groupInvoiceEmail(Request $request, $id) {

        $id = $id;

        $model = Booking::with('client', 'pickupLocation', 'franchisees', 'clientEmail')
                ->where('group_invoice_id', $id)
                //->where('trip_status', 2)
                ->where('invoiced', 1)
                ->get();

        $bookingDetails = Booking::with('client', 'pickupLocation', 'franchisees')
                ->where('group_invoice_id', $id)
                ->first();
        
        $partPayments = PartPayment::where('invoice_id', $id)->get();

        // pr($bookingDetails);
        // exit;

        return view('admin.invoice.invoice-group-preview-mail-part-payments', compact('model', 'bookingDetails', 'id', 'partPayments'));
    }

    function invoiceEmail(Request $request) {

        $model = Booking::with('client', 'pickupLocation', 'franchisees', 'clientEmail')
                ->where('group_invoice_id', $request->group_invoice_id)
                //->where('trip_status', 2)
                ->where('invoiced', 1)
                ->get();


        $bookingDetails = Booking::with('client', 'pickupLocation', 'franchisees')
                ->where('group_invoice_id', $request->group_invoice_id)
                ->first();
        
        $partPayments = PartPayment::where('invoice_id', $request->group_invoice_id)->get();


        //return view('emails.mail', compact('model', 'bookingDetails'));

        foreach ($model as $data) {
            $email_id = @$data->clientEmail->email;
        }

        $email_id = "rahamanh939@gmail.com";

        $inputname = $request->group_invoice_id[0] . '.pdf';

        $pdf = PDF::loadView('admin.invoice.invoice-user-part-payments', ['model' => $model, 'bookingDetails' => $bookingDetails, 'partPayments' => $partPayments], [], [
                    'margin_top' => 0,
                    'margin_left' => 0,
                    'margin_right' => 0,
                    'mirrorMargins' => true,
                    'format' => 'A4'
        ]);

        $filePath = public_path('/groupinvoice/' . $inputname);

        $pdf->save($filePath);

        //------ update invoice override table for sending invoice email to client ------//        
        $invoice_override = BookingInvoiceOverride::find($request->group_invoice_id);

        // set        
        $invoice_override->comment = 'Mail Sent:'. date('m/d/Y');

        // update
        $invoice_override->save();

        Mail::send('emails.mail', ['model' => $model, 'bookingDetails' => $bookingDetails], function ($m) use ($pdf, $filePath, $email_id) {
            $m->from(env('APP_EMIL'), env('APP_EMIL_FROM'));
            $m->to($email_id)
                    ->subject('Invoice ')
                    ->attach($filePath, [
                        'ad' => 'invoice.pdf',
                        'mime' => 'application/pdf'
            ]);
        });       

        $request->session()->flash('success', 'Mail has been successfully sent!');

        return redirect(route('invoice.index'));
    }
    
    /*private function storeInvoiceprice($data){
        
        $editdescription = $data->editdescription;
        $editd_qnry = $data->editd_qnry;
        $editd_unitprice = $data->editd_unitprice;
        $editd_vat = $data->editd_vat;
        $editd_total = $data->editd_total;
        
        foreach($editd_total as $key =>$totla){
            if($totla){
                $comment    = isset($editdescription[$key]) ? $editdescription[$key] : "Default";
                $qnty       = isset($editd_qnry[$key]) ? $editd_qnry[$key] : 1;
                $price      = isset($editd_unitprice[$key]) ? $editd_unitprice[$key] : 1;
                $vat        = isset($editd_vat[$key]) ? $editd_vat[$key] : 0;
                
                $inserData = array(
                    'booking_id'=> $key,
                    'comment'   => $comment,
                    'qnty'      => $qnty,
                    'price'     => $price,
                    'vat'       => $vat,
                    'amount'    => $totla
                );
                
                InvoiceDetails::create($inserData);
            }
        }
    }*/

    private function storeInvoiceprice($data){
        
        //pr($data); die;

        $editdescription = $data['editdescription'];
        $editd_qnry = $data['editd_qnry'];
        $editd_unitprice = $data['editd_unitprice'];        
        $editd_vat = array_key_exists("editd_vat",$data) ? $data['editd_vat'] : [];
        $editd_total = $data['editd_total'];

        //pr($editd_total); die;
        if( $editd_total ){
            
            foreach( $editd_total as $booking_id => $totla ){                

                // delete old invoice details
                \App\InvoiceDetails::where('booking_id', $booking_id)->delete();

                if($totla){
                    
                    foreach( $totla as $index => $amount ){
                        
                        if( $amount ){
                            
                            $comment    = isset($editdescription[$booking_id][$index]) ? $editdescription[$booking_id][$index] : "Default";
                            $qnty       = isset($editd_qnry[$booking_id][$index]) ? $editd_qnry[$booking_id][$index] : 1;
                            $price      = isset($editd_unitprice[$booking_id][$index]) ? $editd_unitprice[$booking_id][$index] : 1;
                            $vat        = isset($editd_vat[$booking_id][$index]) ? $editd_vat[$booking_id][$index] : 0;

                            $inserData = array(
                                'booking_id'=> $booking_id,
                                'comment'   => $comment,
                                'qnty'      => $qnty,
                                'price'     => $price,                                
                                'vat'       => $vat,
                                'amount'    => $amount
                            );

                            //pr($inserData); die;

                            InvoiceDetails::create($inserData);
                        }
                    }
                }
            }
        }
    }
    
    function updateAndFinalize(Request $request) {
        //pr($request->all()); die;
        
        DB::beginTransaction();
        
        try {

            $invoiced = ('finalise' == $request->act) ? 1 : NULL ;

            $url = ('finalise' == $request->act) ? route('invoice.uninvoiced') : url()->previous();
        
            $this->storeInvoiceprice($request->all());
            
            $booking_ids = $request->booking_ids;

            asort($booking_ids);            

            $group_ids = '';
            if($booking_ids){
                $group_ids = implode("-",$booking_ids);
            }            

            $bookingModel = Booking::whereIn('id', $booking_ids)->first();
            $totalAmount = 0;
            
            // get invoice
            $bookingInvoiceOverride = BookingInvoiceOverride::where('id', $request->invoice_override_id)->first();
            
            // check exists
            if($bookingInvoiceOverride){
                $invoiceId = $bookingInvoiceOverride->invoice_id;
            }else{
                $invoiceId = getAutoGeneratedGroupInvoiceId();
            } 

            $invoiceModel = BookingInvoiceOverride::where('id', $request->invoice_override_id)->first();
            // create
            /*$invoiceModel = BookingInvoiceOverride::create([
                'client_id' => $bookingModel->client_id,
                'franchisees_id' => $bookingModel->franchisees_id,
                'booking_count' => Booking::whereIn('id', $booking_ids)->count(),
                'total_amount' => $totalAmount,
                "outstanding_amount" => $totalAmount,
                'invoice_id' => $invoiceId,
                'due_date' => $request->due_date,
                'invoice_date' => $request->invoice_date,
                'invoice_number' => $request->invoice_number ? $request->invoice_number : "IN " . $invoiceId,
                'note' => $request->note,
                'customer_addres' => $request->customer_addres,
                'franchisees_addressee' => $request->franchisees_addressee,
                'user_id' => Auth::user()->id
                ]
            );*/

            if($request->invoice_date){
                $invoice_date = calculateMySqlDateOnly($request->invoice_date);
            }
            
            // set
            $invoiceModel->booking_id = $group_ids;
            $invoiceModel->client_id = $bookingModel->client_id;
            $invoiceModel->franchisees_id = $bookingModel->franchisees_id;
            $invoiceModel->booking_count = Booking::whereIn('id', $booking_ids)->count();
            $invoiceModel->total_amount = $totalAmount;
            $invoiceModel->outstanding_amount = $totalAmount;
            $invoiceModel->invoice_id = $invoiceId;
            $invoiceModel->due_date = $request->due_date;
            $invoiceModel->invoice_date = $invoice_date;
            $invoiceModel->invoice_number = $request->invoice_number ? $request->invoice_number : "IN " . $invoiceId;
            $invoiceModel->note = $request->note;
            $invoiceModel->customer_addres = $request->customer_addres;
            $invoiceModel->franchisees_addressee = $request->franchisees_addressee;            
            
            $invoiceModel->save();
            //pr($invoiceModel->toarray());exit;

            foreach ($request->booking as $bookingPk => $booking) {
                Booking::where('id', $bookingPk)->update(['invoice_descriptio' => $booking]);
            }
            if ($request->bookingCustomPricing) {
                foreach ($request->bookingCustomPricing as $bookingPk => $bookingCustomPricing) {
                    InvoiceDetails::where('id', $bookingPk)->update(['comment' => $bookingCustomPricing]);
                }
            }

            $this->updateTotlaAmount($booking_ids);

            Booking::whereIn('id', $booking_ids)
                    ->update([
                        'invoiced' => $invoiced, //1,
                        'invoice_date' => \Carbon\Carbon::now(),
                        'group_invoice_id' => $invoiceModel->id
            ]);

            $totalAmount = Booking::whereIn('id', $booking_ids)->sum('invoice_price');
            $advanceAmount = Booking::whereIn('id', $booking_ids)->sum('advance_payment_amount');

            // fetch discount
            $editd_discount = ($request->editd_discount) ? $request->editd_discount : '0';
            $final_vat_total = ($request->final_vat_total) ? $request->final_vat_total : '0';

            $invoiceModel->total_amount = ($totalAmount);
            $invoiceModel->outstanding_amount = (($totalAmount - $advanceAmount) - $editd_discount);
            $invoiceModel->discount_amount = $editd_discount;
            $invoiceModel->vat_amount = $final_vat_total;
            $invoiceModel->save();

            DB::commit();

            $request->session()->flash('success', 'Invoice has been successfully Updated!');

            //return redirect(route('invoice.uninvoiced'));
            return redirect($url);
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    private function updateTotlaAmount($ids) {
        $bookingModel = Booking::with('invoice')->whereIn('id', $ids)->get();
        foreach ($bookingModel as $model) {

            $priceWithoutVat = 0;
            $customAmount = 0;

            foreach ($model->invoice as $key => $invoice) {
                $priceWithoutVat += ($invoice->price * $invoice->qnty); //($invoice->amount * $invoice->qnty);
                $customAmount += (vatCalculation($invoice->price, $invoice->vat, true) * $invoice->qnty); //(vatCalculation($invoice->amount, $invoice->vat, true) * $invoice->qnty);
            }
            $bookingPriceVAT = 0;
            if ($model->vat_registered) {
                $bookingPriceVAT = vatCalculation($model->final_price, 20);
            }
            $model->price_without_vat = $model->final_price + $priceWithoutVat;
            $model->price_with_vat = $model->final_price + $customAmount + $bookingPriceVAT;

            $model->invoice_price = $model->final_price + $customAmount + $bookingPriceVAT;
            
            $model->save();

            //pr($model->toarray());die;
        }
    }

    public function partialPayment($id) {

        $model = Booking::with('client', 'invoiceOverride')
                ->where('group_invoice_id', $id)
                ->where('payment_status', 0)
                //->where('trip_status', 2)
                ->where('invoiced', 1)
                ->first();

        //pr($model->toarray());exit;

        $partModel = \App\PartPayment::where('invoice_id', $model->group_invoice_id)->get();

        return view('admin.invoice.partial_payment', compact('model', 'partModel'));
    }

    public function payPartialPayment(Request $request) {

        DB::beginTransaction();
        try {

            $model = BookingInvoiceOverride::find($request->group_invoice_id);

            $request->validate([
                'partial_amount' => ['required', function ($attribute, $value, $fail) use ($model) {

                        if ($value > $model->outstanding_amount) {
                            $fail('Given amount is greater than outstanding amount');
                        }
                    }]
            ]);

            $previous_outstanding_amount = $model->outstanding_amount;

            $model->outstanding_amount = round($model->outstanding_amount - (float) $request->partial_amount, 2);
            $model->save();


            \App\PartPayment::create([
                'invoice_id' => $model->id,
                'amount' => $request->partial_amount,
                'start_outstanding_amount' => $previous_outstanding_amount,
                'end_outstanding_amount' => round($previous_outstanding_amount - (float) $request->partial_amount, 2),
            ]);

            DB::commit();

            $request->session()->flash('success', 'Partial payment done successfully!');
            return redirect(route('invoice.index'));
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }
    
    
    
    //2019-08-28
    public function individualInvoice(Request $request, $booking_ids ) {
        
        //$booking_ids = $request->booking_ids;

        $model = Booking::with('client', 'pickupLocation', 'franchisees')
                ->where('id', $booking_ids)
                // ->where('payment_status', 0)
                // ->where('trip_status', 2)
                ->get();
        $bookingDetails = Booking::with('client', 'pickupLocation', 'franchisees')
                ->where('id', $booking_ids)
                ->first();
        
        //print_r($bookingDetails);  die;
        
        $booking_ids = [$booking_ids];

        asort($booking_ids);            

        $group_ids = '';
        if($booking_ids){
            $group_ids = implode("-",$booking_ids);
        }         
        
        // generate invoice before finalize
        //BookingInvoiceOverride::where('total_amount', '<=', 0)->delete();
        
        $bookingModel = Booking::whereIn('id', $booking_ids)->first();
        $totalAmount = 0;
        $invoiceId = getAutoGeneratedGroupInvoiceId();
        
        if(BookingInvoiceOverride::where('booking_id', $group_ids)->count() <= 0){
            $invoiceModel = BookingInvoiceOverride::create([
                'booking_id' => $group_ids,
                'client_id' => 0,//$bookingModel->client_id,
                'franchisees_id' => 0, //$bookingModel->franchisees_id,
                'booking_count' => 0, //Booking::whereIn('id', $booking_ids)->count(),
                'total_amount' => $totalAmount,
                "outstanding_amount" => $totalAmount,
                'invoice_id' => $invoiceId,                    
                'invoice_date' => date("Y-m-d"),
                'invoice_number' => "IN " . $invoiceId,                   
                'user_id' => Auth::user()->id
                ]
            );
        }else{
            $invoiceModel = BookingInvoiceOverride::where('booking_id', $group_ids)->first();
        }

        //
        return view('admin.invoice.invoice-group-preview-edit', compact('model', 'bookingDetails', 'booking_ids','invoiceModel'));

        $pdf = PDF::loadView('admin.invoice.invoice-group-preview', ['model' => $model, 'bookingDetails' => $bookingDetails, 'invoiceModel' => $invoiceModel], [], [
                    'margin_top' => 0,
                    'margin_left' => 0,
                    'margin_right' => 0,
                    'mirrorMargins' => true,
                    'format' => 'A4'
        ]);

        //Booking::whereIn('id', $booking_ids)->update(['invoiced'=>1]);
        //$request->session()->flash('success', 'Invoice has been successfully Finalized!');
        //return redirect(route('invoice.uninvoiced'));

        return $pdf->stream('document.pdf');         
    }


    public function agedDebtors(Request $request) {
        
        $franchisees = session()->get('selectedFranchisees');
        $todayYear = Carbon::now()->subYear(1)->startOfDay();
        $yearMonth = array();
        $dat = new Carbon($todayYear->toDateString());     
                 
        /*for ($i = 0; $i < 12; $i++) {
            $yearMonth[] = $dat->addMonth()->format('m-Y');
        }*/
        
        for ($i = 0; $i < 6; $i++) {
            $yearMonth[] = date("m-Y", strtotime("-".$i." months"));//date('m-Y', strtotime('-'.$i. 'months', strtotime($today))); 
        }
        
        $yearMonth = array_reverse($yearMonth);

       // pr(array_reverse($yearMonth)); die;

        $today = Carbon::now();      
        

        $query = \App\Client::select('client.id','client.firstname', 'client.surname', DB::raw('sum(booking_invoice_override.outstanding_amount) as total'), DB::raw("DATE_FORMAT(booking_invoice_override.invoice_date,'%m-%Y')  as dt"))
                ->join('booking_invoice_override', 'booking_invoice_override.client_id', '=', 'client.id')
                ->where('booking_invoice_override.payment_status', 0)
                ->where('booking_invoice_override.total_amount','>', 0)
                ->whereRaw("DATEDIFF('" . Carbon::now() . "',dob)  > 60")
                ->groupBy(DB::raw("dt"), 'booking_invoice_override.client_id');

        $clientModel = $query->get();
        //pr($clientModel); die;

        $data = array();
        
        foreach ($clientModel as $model) {
            $data[$model->id]['firstname'] = $model->firstname. ' '. $model->surname;
            $data[$model->id]['data'][$model->dt] = array(                
                'total' => $model->total
            );            
        }       

        //pr($data); die;

        return view('admin.invoice.aged-debtors', compact('data', 'yearMonth'));        
    }


    public function updateInline(Request $request)
    {
        // post
        if( $request->has('act') &&  ('save_comment' == $request->get('act')) ){
            
            // post
            $post = $request->all();
           
            // find by id
            $invoice_id = $post['pk'];
            
            $field_name = $post['name'];

            try{

                $field_value = $post['value'];
               
                if( $invoice_id ){
                    // find
                    $invoice = BookingInvoiceOverride::findOrFail($invoice_id);
                }

                // save
                $invoice->{$field_name} = $field_value;
                $invoice->save();
            }
            catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e)
            {
                
            }catch (Exception $e){
                $request->session()->flash('error', 'Oops something went wrong try again !');    
            }               
            

            // ajax
            return response()->json();
        }   
    }
}