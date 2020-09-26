<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\User;
use Auth;
use App\Http\Requests\ClientCreate;
//use App\Http\Requests\FaqUpdate;
use App\Booking;
use Illuminate\Support\Facades\Validator;
use Form;
use Excel;
use PDF;

class ClientController extends Controller {

    public function index(Request $request) {
        $query = Client::franchisee()->sortable();
        $query->has('franchisees');
        $query->with('franchisees');
        if ($request->firstname) {
            $query->where('firstname', 'like', '%' . $request->firstname . '%');
        }
        if ($request->surname) {
            $query->where('surname', 'like', '%' . $request->surname . '%');
        }
        if ($request->email) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->phone) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }
        if ($request->house_number) {
            $query->where('house_number', 'like', '%' . $request->house_number . '%');
        }

        $models = $query->orderBy('id', 'DESC');

//        -----pdf start----
        if ($request->downloadpdf) {
            $models = $query->get();
            $pdf = PDF::loadView('admin.client.pdf-client', ['models' => $models], [], [
                        'margin_top' => 0,
                        'margin_left' => 0,
                        'margin_right' => 0,
                        'mirrorMargins' => true,
                        'format' => 'A4'
            ]);
            return $pdf->stream('document.pdf');
        }
//        ------pdf end----
//        ---------csv start------
        if ($request->downloadcsv) {
            $model = $query->get();

            $filename = "client.csv";
            $fp = fopen('php://output', 'w');
            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename=' . $filename);
            $header[1] = "Name";
            $header[2] = "Surname";
            $header[3] = "Email";
            $header[4] = "Mobile";
            $header[5] = "Landline";
            $header[6] = "Address";
            $header[7] = "Permanent Notes";
            $header[8] = "Mobility";

            fputcsv($fp, $header);

            $data = array();
            foreach ($model as $key => $val) {
                $data['firstname'] = $val->firstname;
                $data['surname'] = $val->surname;
                $data['email'] = $val->email;
                $data['phone'] = $val->phone;
                $data['home_number'] = $val->home_number;
                $data['address'] = $val->address;
                $data['client_health_notes'] = $val->client_health_notes;
                $data['mobility_level'] = $val->mobility_level;

                fputcsv($fp, $data);
            }
            exit();
        }

//        ---------csv end------



        $models = $query->paginate(25);
        return view('admin.client.index', compact('models'));
    }

    public function create(Request $request) {
        $client = Client::franchisee()->get();
        $client = clientName($client);
        //return view('admin.client.create');

        return view('admin.client.create', compact('client'));
    }

    public function store(ClientCreate $request) {
        
        try {
            
            $data = $request->all();

            if($data['dob']){
                $data['dob'] = calculateMySqlDateOnly($data['dob']);
            }

            //pr($data); die;

            $selfid = $request->paying_bill;
            
            $model = new Client($data);

            $model->users_id = Auth::user()->id;

            if (isSuperAdmin()) {
                if (selectedFranchisees()) {
                    $model->franchisees_id = selectedFranchisees();
                } else {
                    $model->franchisees_id = $request->franchisees_id;
                }
            } else {
                $model->franchisees_id = Auth::user()->franchisees_id;
            }

            $model->save();
            if ($selfid == 1) {
                $model->payment_clientid = $model->id;
            }
            $model->save();
            $request->session()->flash('success', 'Client has been successfully Created!');
            return redirect(route('client.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {
        $model = Client::findOrFail($id);

        $query = Booking::Franchisee();
        $query->where('client_id', $model->id);
        $models = $query->latest()->paginate(25);

        return view('admin.client.show', ['model' => $model, 'models' => $models]);
    }

    public function edit($id) {
        
        $model = Client::find($id);
        
        if ($model->payment_clientid != $model->id) {
            $model->paying_bill = 2;
        }

        $client = Client::franchisee()->get();
        $client = clientName($client);
        return view('admin.client.edit', compact('model', 'client'));
    }

    public function update(ClientCreate $request, $id) {
        try {

            $model = Client::find($id);
            $input = $request->all();

            if ($request->paying_bill == 1) {
                $input['payment_clientid'] = $model->id;
                $selfid = $request->paying_bill;
            }

            if($input['dob']){
                $input['dob'] = calculateMySqlDateOnly($input['dob']);
            }

            $model->update($input);
            $request->session()->flash('success', 'Client has been successfully Updated!');
            return redirect(route('client.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function destroy($id) {
//        $request->session()->flash('error', 'Action not allow!');
//        return redirect()->back();
        $role = Client::findOrFail($id);
        $role->forceDelete();
        \Session::flash('success', 'Client has been successfully deleted!');
        return redirect()->back();
    }

    public function addPopup() {
        $client = Client::franchisee()->get();
        $client = clientName($client);
        return view('admin.client.addPopup', compact('client'));
        //return view('admin.client.addPopup');
    }

    public function storePopup(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:255',
            'surname' => 'required|min:2|max:255',
            'dob' => 'required|date_format:m/d/Y',
            'email' => 'nullable|email',
            'phone' => 'nullable',            
            //'phone' => 'nullable|numeric|digits_between:10,12',
            //'house_number' => 'required',
            //'street' => 'required|min:5|max:255',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $validationError = validationError($errors);
            return response()->json(['response' => 0, 'errors' => $validationError]);
        } else {
            try {
                $clientId = getClientId($request);
                $client = Client::franchisee()->get();
                $client = clientName($client);
                $data = Form::select('payment_clientid', $client, $clientId, array('class' => 'form-control ', 'placeholder' => 'Please Select '));

                return response()->json(['response' => 1, 'data' => "" . $data . ""]);
            } catch (Exception $e) {

            }
        }
    }

//    public function downloadExcel($type)
//    {
//        $data = Client::get()->toArray();
//            pr($data);
//            die();
//        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
//            $excel->sheet('mySheet', function($sheet) use ($data)
//            {
//                $sheet->fromArray($data);
//            });
//        })->download($type);
//    }
//    public function preview( Request $request) {
//
//
//        $query = Client::franchisee();
//
//        if ($request->email) {
//            $query->where('email', 'like', '%' . $request->email . '%');
//        }
//        if ($request->phone) {
//            $query->where('phone', 'like', '%' . $request->phone . '%');
//        }
//        if ($request->house_number) {
//            $query->where('house_number', 'like', '%' . $request->house_number . '%');
//        }
//
//
//         //$query = Client::franchisee();
//         $model = $query->get();
//
//        //$model = Booking::with('client', 'pickupLocation', 'franchisees')->findOrFail($id);
//        $pdf = PDF::loadView('admin.client.pdf-client', ['model' => $model], [], [
//                    'margin_top' => 0,
//                    'margin_left' => 0,
//                    'margin_right' => 0,
//                    'mirrorMargins' => true,
//                    'format' => 'A4'
//        ]);
//        return $pdf->stream('document.pdf');
//    }
}
