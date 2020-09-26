<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ImportHistory;
use Auth;
use Illuminate\Support\Facades\Validator;
use DB;

class ImportController extends Controller {

    public function index() {
        $query = ImportHistory::latest();

        if (!getActiveFranchisee()) {
            $query->with('franchisees');
        }
        $models = $query->paginate(20);
        return view('admin.import.index', compact('models'));
    }

    public function client() {
        return view('admin.import.client');
    }

    public function postClient(Request $request) {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
        $linecount = 1;
        $destinationPath = 'uploads';

        $errorLogFile = time() . ".log";
        $error_file = $errorLogFile;
        $errorLogLocation = public_path($destinationPath . "/logfile/" . $errorLogFile);
        $errorLogFile = fopen($errorLogLocation, "w");
        $file = $request->file('file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($destinationPath), $filename);
        $file = fopen(public_path($destinationPath . "/" . $filename), 'r');
        while (($line = fgetcsv($file)) !== FALSE) {

            $data = array(
                "firstname" => $line[1],
                "surname" => $line[2],
                "address" => $line[3],
                "phone" => $line[6],
                "email" => $line[7],
            );


            $validator = Validator::make($data, [
                        'firstname' => 'required',
                        'firstname' => 'required',
                        'address' => 'required',
                        'phone' => 'nullable|numeric',
                        'email' => 'nullable|email',
                            ]
            );
            if ($validator->fails()) {
                $errors = $validator->errors()->toArray();
                $validationError = validationError($errors);
                $logData = 'Line Number: ' . $linecount . " : " . implode(",  ", $validationError);
                fwrite($errorLogFile, $logData . "\n");
            } else {
                $formularyResult = new \App\Client($data);
                $formularyResult->franchisees_id = selectedFranchisees();
                $formularyResult->users_id = Auth::user()->id;
                $formularyResult->save();
            }
            $linecount ++;
        }



        $model = new ImportHistory();
        $model->user_id = Auth::user()->id;
        $model->franchisees_id = selectedFranchisees();
        $model->type = 1;
        $model->log_file = $error_file;
        $model->upload_file = $filename;
        $model->save();
        return redirect(route('import-index'));
    }

    public function getImport() {
        return view('import');
    }

// Franchisee csv import  
//    public function parseImport(Request $request)
//    {
//       
//        $path = $request->file('csv_file')->getRealPath();
//        $data = array_map('str_getcsv', file($path));
//       
//        foreach($data as $row) {
//            $input = [
//                'name'=>$row[1],
//                'contact_person_name'=>$row[2],
//                'locality'=>$row[3],
//                'contact_person_phone'=>$row[6],
//                'contact_person_email'=>$row[7],
//                'status'=>($row[4]=='Active')?1:0,
//                'street'=> 'Street',
//                'town'=> 'Town',
//                'postcode'=> 'Postcode',
//                ];
//            
//            $user = Franchisee::create($input);
//            $franchiseeid = $user->id;
//            
//            $franinput = [
//                'franchisees_id'=>$franchiseeid,
//                'driver_cost'=>'0.00',
//                'vehicle_cost'=>'0.00',
//                'comfort_cost'=>'0.00',
//                'paid_mileage'=>'0.00',
//                'base_driving_cost'=>'0.00',
//                'waiting_time_cost'=> '0.00',
//                'companionship_cost'=> '0.00',
//                
//                ];
//            $franchiseesprice = FranchiseesPrice::create($franinput);
//            $franchiseeid = $franchiseesprice->id;
//            $franchisee_id = $franchiseesprice->franchisees_id;          
//            
//        }
//        
//    }  
//           
//    public function parseImport444444(Request $request)
//    {
//       
//        $path = $request->file('csv_file')->getRealPath();
//        $data = array_map('str_getcsv', file($path));
//        //pr($data);
//        //die();
//        
//        
//        foreach($data as $row) {
//            
//
////$str = $row[3];
////$locality = explode(',',$str,0);
////$street = explode(',',$str,1);
////$postcode = explode(',',$str,2);
//
//
//            Franchisee::Create([
//                'name'=>$row[1],
//                'contact_person_name'=>$row[2],
//                'locality'=>$row[3],
//                'contact_person_phone'=>$row[6],
//                'contact_person_email'=>$row[7],
//                'status'=>($row[4]=='Active')?1:0,
//                'street'=> 'Street',
//                'town'=> 'Town',
//                'postcode'=> 'Postcode',
//            ]); 
//            
////            FranchiseesPrice::Create([
////                'franchisees_id'=>$row[0],
////                'driver_cost'=>'0.00',
////                'vehicle_cost'=>'0.00',
////                'comfort_cost'=>'0.00',
////                'paid_mileage'=>'0.00',
////                'base_driving_cost'=>'0.00',
////                'waiting_time_cost'=> '0.00',
////                'companionship_cost'=> '0.00',
////                //'postcode'=> 'Postcode',
////            ]); 
//            
//        }
//        
//    }
//    Booking Csv import

    public function parseImport(Request $request) {

        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));

        foreach ($data as $row) {
            $bookingdate = $row[0];
            $createdate = $row[19];
            $bookingstr = str_replace('/', '-', $bookingdate);
            $created = str_replace('/', '-', $createdate);
            $input = [
                'booking_time' => $bookingstr,
                'name' => $row[2],
                'drop_location' => $row[5],
                'total_price' => $row[10],
                'trip_status' => $row[13],
                'journey_type' => $row[14],
                'payment_mode' => $row[15],
                'note' => $row[16],
                'created_at' => $created,
            ];
            $booking = Booking::create($input);
            $bookingid = $booking->id;

            $bookingdetails = [
                'booking_id' => $bookingid,
                'customPrice' => '0.00',
                'total_distance' => '0.00',
                'total_duration' => '0.00',
                'total_price' => $row[10],
                'trip_expense' => '0.00',
                'waitingCost' => '0.00',
                'companionCost' => '0.00',
                'comfortCost' => '0.00',
                'base_driving_cost' => '0.00',
                'paid_mileage' => '0.00',
                'driver_charge' => '0.00',
                'vehicle_charge' => '0.00',
                'tripAmount' => '0.00',
                'tripProfit' => '0.00',
                'custom_tripAmount' => '0.00',
                'custom_tripProfit' => '0.00',
                'created_at' => $row[19],
            ];
            $bookingdetails = BookingDetails::create($bookingdetails);


            $pickuplocations = [
                'booking_id' => $bookingid,
                'location_name' => $row[5],
                'distance' => '0',
                'travel_time' => '0',
                'created_at' => $row[19],
            ];
            $pickuplocation = PickupLocation::create($pickuplocations);
        }
    }

}
