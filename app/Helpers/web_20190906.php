<?php

function pr($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function getDefaultPermission() {
    return Session::has('defaultPermission') ? Session::get('defaultPermission') : [];
}

function getUserRole($user) {
    return $user->roles()->get()->pluck('name')->toArray();
}

function getUserPermissions($user) {
    $roles = $user->roles;
    $perms = [];
    $names = [];
    foreach ($roles as $role) {
        $perms[] = $role->perms()->get()->pluck('name')->toArray();
    }
    $result = array_flatten($perms);
    return $result;
}

function getAllUserByPermission($permissions = array()) {
    $users = User::get();
    $result = array();
    foreach ($users as $user) {
        if ($user->can($permissions, true)) {
            $result[] = $user;
        }
    }
    return $result;
}

function getArray($arr, $key) {
    $result = [];
    if (is_array($arr) || is_object($arr)) {
        foreach ($arr as $item) {
            $result[$item->id] = $item->$key;
        }
        return $result;
    }
    return array();
}

function getAllUserByRole($role) {
    $users = User::get();

    $result = [];
    foreach ($users as $user) {
        if ($user->hasRole($role)) {
            $result[] = $user;
        }
    }
    return $result;
}

function getAllUserByRoleAndPermission($role, $pemissions) {
    $users = User::get();
    $result = [];
    foreach ($users as $user) {
        if ($user->hasRole($role) && $user->can($pemissions, true)) {
            $result[] = $user;
        }
    }
    return $result;
}

function menuActiveClass($active = null, $type = null) {
    $currentPath = Request::route()->getName();
    $currentPathAry = explode(".", $currentPath);
    $controller = $currentPathAry[0];
    if ($type) {
        if (in_array($controller, $active)) {
            return "active open";
        }
    } else {
        if ($active == $controller) {
            return "active open";
        }
    }
}

function permit() {
    if (isSuperAdmin()) {
        return true;
    }
    $user = Auth::user();

    $args = func_get_args();
    $permissions = Session::has('permissions') ? Session::get('permissions') : [];

    $defaultPermission = getDefaultPermission();

    $permissions = array_merge($defaultPermission, $permissions);
    $result = false;
    foreach ($args as $arg) {
        if (count(array_intersect($arg, $permissions)) == count($arg)) {
            $result = true;
        }
    }

    return $result;
}

function isSuperAdmin() {
    $user = Auth::user();
    if ($user->is_super == 1 && $user->user_type == 1) {
        return true;
    }
    return false;
}

function createUrl() {
    $arg_list = func_get_args();
    $url = "";
    foreach ($arg_list as $key => $val) {
        $url .= "$val ";
    }
    $url = rtrim($url);
    $url = str_replace(" ", "-", $url);
    $url = preg_replace('/[^a-zA-Z0-9_-]|$/s', '', $url);
    $url = strtolower($url);

    return $url;
}

function getConfigValue($configValue, $name = false) {
    $config = Session::get('GeneralSetting');
    if (isset($config[$configValue])) {
        if ($name) {
            $result = array(
                'name' => $config[$configValue]['name'],
                'value' => $config[$configValue]['value'],
                'alt_text' => $config[$configValue]['alt_text'],
            );
            return (object) $result;
        } else {
            return isset($config[$configValue]['value']) ? $config[$configValue]['value'] : "-";
        }
    } else {
        return false;
    }
}

function getState($name = false) {
    $state = array('NSW' => 'NSW', 'NT' => 'NT', 'QLD' => 'QLD', 'WB' => 'WB', 'VIC' => 'VIC', 'SA' => 'SA', 'TAS' => 'TAS');
    if ($name) {
        return isset($state[$name]) ? $state[$name] : "-";
    } else {
        return $state;
    }
}

//function getCountry($name = false) {
//    $allcountry= App\Country::get(); 
//    if ($name) {
//        return isset($allcountry[$name]) ? $allcountry[$name] : "-";
//    } else {
//        return $allcountry;
//    }
//}


function getCountry($type = true) {
    $allcountry = App\Country::orderBy('country_name')->pluck('country_name', 'country_name')->toArray();
    if ($type) {
        $allcountry = [0 => "Select Country"] + $allcountry;
    }
    return $allcountry;
}

function getPagesAttribute() {
    $type = ['text' => 'Text', 'image' => 'Image', 'editor' => 'Editor'];
    return $type;
}

//function validationError($errors) {
//    $validationError = array();
//    foreach ($errors as $key => $message) {
//        if (!isset($validationError[$key])) {
//            $validationError[$key] = is_array($message) ? $message[0] : $message;
//        }
//    }
//    return $validationError;
//}

function getPageData($id) {
    $pages = App\Cms::findOrFail($id);
    if ($pages) {
        $attribute = "";
        $attributeModels = App\CmsAttributes::where('page_id', $pages->id)->get();
        foreach ($attributeModels as $pageAttribute) {
//                $attribute[$pageAttribute->url] = (object) array(
//                    'value' => $pageAttribute->value,
//                    'alt_text' => $pageAttribute->alt_text
//                );
            $attribute[$pageAttribute->url] = $pageAttribute->value;
        }
        $pages->pageAttribute = (object) $attribute;
    }
    return $pages;
}

function customerAllowToView($date) {
    $today = date("Y-m-d H:i:s");
    if ($date > $today) {
        return true;
    } else {
        return false;
    }
}

function calculateExpDate($days) {
    return date("Y-m-d H:i:s", strtotime("+$days days"));
}

function calculateMySqlDate($date) {
    
    return date("Y-m-d H:i:s", strtotime($date));
}

function showDate($date, $onlyDate = false, $onlyMonth = false) {
    if ($date) {
        if ($onlyDate) {
            return \Carbon\Carbon::parse($date)->format('D:d:M:Y');
        } else if ($onlyMonth) {
            return \Carbon\Carbon::parse($date)->format('d F');
        } else {
            return \Carbon\Carbon::parse($date)->format('D:d:M:Y H:i');
        }
    } else {
        return "-";
    }
}

function isFranchisor() {
    $user = Auth::user();
    if (isSuperAdmin()) {
        return true;
    } else if ($user->user_type == 1) {
        return true;
    }
    return false;
}

function getFranchisees($type = true) {
    $franchisee = App\Franchisee::pluck('name', 'id')->toArray();
    if ($type) {
        $franchisee = [0 => "Franchisor"] + $franchisee;
    }
    return $franchisee;
}

function selectedFranchisees() {
    if (session()->has('selectedFranchisees')) {
        return session()->get('selectedFranchisees');
    }
}

function getActiveFranchisee() {
    if (session()->has('selectedFranchisees')) {
        return session()->get('selectedFranchisees');
    } else {
        return false;
    }
}

function franchiseeUser($super = false) {
    $user = Auth::user();
    if (isSuperAdmin()) {
        return true;
    } else if ($user->user_type == 2) {
        if ($super) {
            if ($user->is_super == 1) {
                return true;
            } else {
                return false;
            }
        }
        return true;
    }
    return false;
}

function getColor($num) {


    $dt = '#';
    for ($o = 1; $o <= 3; $o++) {
        $dt .= str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT);
    }
    return $dt;


    $hash = md5('color' . $num); // modify 'color' to get a different palette
    $r = hexdec(substr($hash, 0, 2));
    $g = hexdec(substr($hash, 2, 2));
    $b = hexdec(substr($hash, 4, 2));
    return "rgb($r, $g, $b)";
}

function getColorBookingCalender($usertype, $type) {

    if ($type == 'RB') {
        return "rgb(50,205,50)";
    }
    if ($usertype == 1) {

        if ($type == 'B') {
            return "rgb(40,157,168)";
        } else if ($type == 'A') {
            return "rgb(20,78,84)";
        }
    }

    if ($usertype == 2) {

        if ($type == 'B') {
            return "rgb(240,128,128)";
        } else if ($type == 'A') {
            return "rgb(255,0,0)";
        }
    }
}

function paymentMode($type = false) {
    $paymentMode = [1 => "Cash", 2 => "Credit", 3 => ' Invoice Pre-pay', 4 => "Gift Voucher"];
    if ($type) {
        return isset($paymentMode[$type]) ? $paymentMode[$type] : 0;
    }
    return $paymentMode;
}

function waitingPrice($waitingTime, $cost) {
    $priceSlab = 0;
    if ($waitingTime) {
        do {
            $priceSlab++;
            $waitingTime = $waitingTime - 15;
        } while ($waitingTime > 0);
    }
    return $priceSlab * $cost;
}

function companionPrice($companionTime, $cost) {
    $priceSlab = 0;
    if ($companionTime) {
        do {
            $priceSlab++;
            $companionTime = $companionTime - 15;
        } while ($companionTime > 0);
    }
    return $priceSlab * $cost;
}

function getLatLong($address) {
    $address = str_replace(" ", "+", $address);
    $region = "india";
    $key = env('GEOCODE_KEY', "");
    $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region&key=$key");
    $result = json_decode($json);
    if ($result->status == "OK") {
        $lat = $result->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        $long = $result->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
        return [
            'lat' => $lat,
            'long' => $long
        ];
    } else {
        return false;
    }
}

function getDriverForBooking($bookin) {
    $bookingTime = $bookin->booking_time;
    $total_duration = $bookin->total_duration;
    $models = \App\DriversVehicles::whereHas('driver')->whereHas('vehicle')->Franchisee()->get();
    $vehicles = array();
    foreach ($models as $model) {
        $vehicles[$model->driver->id] = $model->driver->fullName . " (" . $model->vehicle->vehicles_number . ")";
    }
    return $vehicles;
}

function tripProfit($total, $trip_expense) {
    if ($total) {
        return $profit = round(($total - $trip_expense) * (100 / $total), 2);
    } else {
        return 0;
    }
}

function bookingStatus() {
    return [
        1 => "Trip Start",
        2 => "Trip Complete",
        3 => "Breakdown",
//        4 => "",
//        5 => "",
        8 => "Driver Not allocation",
        9 => "Wait for Response",
        10 => "Accept",
        11 => "Reject",
    ];
}

function getOrderNo($id, $pre = "O") {
    $orderId = 10000 + $id;
    return $pre . "-" . $orderId;
}

function chartReport() {

    $month = false;
    $franchisees = session()->get('selectedFranchisees');


    $firstDay = new Carbon\Carbon('first day of last month');
    $firstDay = $firstDay->startOfDay();
    $lastDay = new Carbon\Carbon('last day of last month');
    $lastDay = $lastDay->endOfDay();


    $lastthirtydays = \Carbon\Carbon::today()->subDays(30);
    $today = \Carbon\Carbon::today();
    $alldate = \Carbon\CarbonPeriod::create($lastthirtydays, $today);

    $chartLabelsTemp = array();
    $chartLabels = array();

    foreach ($alldate as $date) {
        $chartLabelsTemp[] = $date->format('d/n');
        $chartLabels[] = $date->format('d');
    }



    $query = \App\Booking::select(DB::raw('sum(final_price) as total'), DB::raw('DATE_FORMAT(booking_time,"%d/%c") as dt'))
            ->where('trip_status', 2)
            ->where('booking_time', '>', $lastthirtydays);
    //->whereBetween('booking_time', [$firstDay, $lastDay]);
    if ($franchisees) {
        $query->where('franchisees_id', $franchisees);
    }

    $bookingModel = $query->groupBy(DB::raw("dt"))->pluck('total', 'dt')->toArray();
    $dataChart = array();
    $color = array();
    $data = array();



    foreach ($chartLabelsTemp as $key => $model) {

        $color[] = getColor($key);
        if (array_key_exists($model, $bookingModel)) {
            $data[] = $bookingModel[$model];
        } else {
            $data[] = 0;
        }
    }

    //pr($data);
    //die();

    $dataChart[] = array(
        'label' => false,
        'fill' => false,
        'backgroundColor' => $color,
        'borderColor' => $color,
        'data' => $data
    );

    return array(
        'labels' => $chartLabels,
        'data' => $dataChart
    );
}

function chartReportDriver() {

    $month = false;
    $franchisees = session()->get('selectedFranchisees');

    $lastthirtydays = \Carbon\Carbon::today()->subDays(30);

//    $today = \Carbon\Carbon::today();
//    $alldate = \Carbon\CarbonPeriod::create($lastthirtydays, $today);
//    
//    $chartLabelsTemp=array();
//    $chartLabels=array();
//    
//    foreach ($alldate as $date) {
//        $chartLabelsTemp[] = $date->format('d/n');
//        $chartLabels[] = $date->format('d'); 
//    }



    $query = \App\BookingDetails::select('booking.booking_time', 'booking_id', DB::raw('sum(outward_destination)+ sum(return_destination)as total'), DB::raw('date(booking.booking_time) as dt'))
            ->join('booking', 'booking.id', '=', 'booking_details.booking_id')
            ->where('booking.trip_status', 2)
            ->where('booking.booking_time', '>', $lastthirtydays);


    $query1 = \App\PickupLocation::select('booking.booking_time', 'booking_id', DB::raw('sum(distance) as distance'), DB::raw('date(booking.booking_time) as dt'))
            ->join('booking', 'booking.id', '=', 'pickup_locations.booking_id')
            ->where('pickup_position', 99)
            ->where('booking.booking_time', '>', $lastthirtydays);

    if ($franchisees) {
        $query->where('booking.franchisees_id', $franchisees);
    }


    $bookingdetailsModel = $query->groupBy(DB::raw("dt"))->get();

    //$bookingdetailsModel = $query->groupBy(DB::raw("dt"))->pluck('total','dt')->toArray();
    //pr($bookingdetailsModel);
    //die();

    $pickuplocationModel = $query1->groupBy(DB::raw("dt"))->get();

    //$pickuplocationModel = $query1->groupBy(DB::raw("dt"))->pluck('distance','dt')->toArray();


    $chartLabels = array();
    $data = array();
    $pickuplocation = array();


//    foreach ($chartLabelsTemp as $key => $model) {     
//        //$color[] = getColor($key);
//        if(array_key_exists($model,$bookingdetailsModel)){
//            $data[]=$bookingdetailsModel[$model];
//        }
//        else{
//            $data[]=0;
//        }           
//    }

    foreach ($bookingdetailsModel as $key => $model) {
        $data[] = round($model->total, 1);
        $chartLabels[] = date("d", strtotime($model->dt));
    }


    foreach ($pickuplocationModel as $key => $models) {
        $pickuplocation[] = round($models->distance, 2);
    }


//    foreach ($chartLabelsTemp as $key => $model) {
//     
//        //$color[] = getColor($key);
//        if(array_key_exists($model,$pickuplocationModel)){
//            $pickuplocation[]=$pickuplocationModel[$model];
//        }
//        else{
//            $pickuplocation[]=0;
//        }           
//    }


    return array(
        'labels' => $chartLabels,
        'data' => $data,
        'pickuplocation' => $pickuplocation
    );
}

function chartReportCompanion() {

    $month = false;
    $franchisees = session()->get('selectedFranchisees');


    $lastthirtydays = \Carbon\Carbon::today()->subDays(30);

    $query = \App\BookingDetails::select('booking.booking_time', DB::raw('sum(booking_details.outward_companion)+sum(outward_companion_cost) as total'), DB::raw('date(booking.booking_time) as dt'))
            ->join('booking', 'booking.id', '=', 'booking_details.booking_id')
            ->where('booking.trip_status', 2)
            ->where('booking.booking_time', '>', $lastthirtydays);


    $query1 = \App\PickupLocation::select('booking.booking_time', 'booking_id', DB::raw('sum(distance) as distance'), DB::raw('date(booking.booking_time) as dt'))
            ->join('booking', 'booking.id', '=', 'pickup_locations.booking_id')
            ->where('pickup_position', 99)
            ->where('booking.booking_time', '>', $lastthirtydays);

    if ($franchisees) {
        $query->where('booking.franchisees_id', $franchisees);
    }

    $companiontotalcostModel = $query->groupBy(DB::raw("dt"))->get();

    //pr($companiontotalcostModel->toArray());
    //die();

    $pickuplocationModel = $query1->groupBy(DB::raw("dt"))->get();
    //pr($pickuplocationModel->toArray());
    //die();

    $chartLabels = array();
    $data = array();
    $pickuplocation = array();

    foreach ($companiontotalcostModel as $key => $model) {
        $data[] = round($model->total, 1);
        $chartLabels[] = date("d", strtotime($model->dt));
    }

    foreach ($pickuplocationModel as $key => $models) {
        $pickuplocation[] = round($models->distance, 2);
    }

    return array(
        'labels' => $chartLabels,
        'data' => $data,
        'pickuplocation' => $pickuplocation
    );
}

function weeklyPriceBooking() {

    $date = \Carbon\Carbon::now();
    $week = $date->weekOfYear;
    $year = $date->year;
    $date->setISODate($year, $week);
    $startwe = $date->copy()->startOfWeek();
    $endweek = $date->copy()->endOfWeek();


    //$lastweek = \Carbon\Carbon::today()->subWeeks(1);    
    
    
//    SELECT YEAR(booking_time) AS Year, DATE_FORMAT(booking_time, '%b %e') AS Week, COUNT(*) AS total FROM booking GROUP BY Year, Week


    $query = \App\Booking::select(DB::raw('AVG(total_price) as avgprice'), DB::raw('date(booking_time) as dt'))
            ->where('trip_status', 2)
            ->whereBetween('booking_time', [$startwe, $endweek]);
    //->whereBetween('booking_time', array($date->copy()->startOfWeek(), $date->copy()->endOfWeek()));
    //->where('booking_time', ">",$lastweek);

    $lastweekModel = $query->groupBy(DB::raw("dt"))->get();

    //pr($lastweekModel->toArray());
    //die();
    $dataChart = array();
    $chartLabels = array();
    $color = array();
    $data = array();
    foreach ($lastweekModel as $key => $model) {
        $data[] = round($model->avgprice, 2);
        $color[] = getColor($key);
        $chartLabels[] = date("d", strtotime($model->dt));
        //$chartLabels[] = date("d", FORMAT(booking[booking_time], "MMM DD"));
    }
//Day = FORMAT(Table[Date], "MMM DD")


    $dataChart[] = array(
        'label' => false,
        'fill' => false,
        'backgroundColor' => $color,
        'borderColor' => $color,
        'data' => $data
    );
    return array(
        'labels' => $chartLabels,
        'data' => $dataChart
    );
}

function chartReportYear() {
    $month = false;
    $franchisees = session()->get('selectedFranchisees');
    $todayYear = Carbon\Carbon::now()->subYear(1)->startOfDay();
    $today = Carbon\Carbon::now();
    $query = \App\Booking::select(DB::raw('sum(final_price) as total'), DB::raw("DATE_FORMAT(booking_time,'%Y%m')  as dt"))
            ->where('trip_status', 2)
            ->whereBetween('booking_time', [$todayYear, $today])
            ->orderBy(DB::raw("dt"))
            ->groupBy(DB::raw("dt"));
    if ($franchisees) {
        $query->where('franchisees_id', $franchisees);
    }
    $bookingModel = $query->get();

    $dataChart = array();
    $chartLabels = array();
    $color = array();
    $data = array();
    foreach ($bookingModel as $key => $model) {

        $month = substr($model->dt, 4, 2);
        $month = $month * 1;

        $data[] = round($model->total, 2);
        $color[] = getColor($key);
        $chartLabels[] = getMonthsName($month);
    }

    $dataChart[] = array(
        'label' => false,
        'fill' => false,
        'backgroundColor' => $color,
        'borderColor' => $color,
        'data' => $data
    );
    return array(
        'labels' => $chartLabels,
        'data' => $dataChart
    );
}

function getClientId($request) {
    $client = \App\Client::where('phone', $request->phone)->where('firstname', $request->name)->first();

    if ($client) {
        return $client->id;
    } else {
        $data = array(
            'franchisees_id' => session()->get('selectedFranchisees'),
            'users_id' => Auth::user()->id,
            'firstname' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'house_number' => $request->house_number,
            'home_number' => $request->home_number,
            'address' => $request->address,
            'client_health_notes' => $request->client_health_notes,
            'mobility_level' => $request->mobility_level
        );
        $model = \App\Client::create($data);
        if ($model) {
            if ($request->payment_clientid) {
                $model->payment_clientid = $request->payment_clientid;
            } else {
                $model->payment_clientid = $model->id;
            }
            $model->save();
            return $model->id;
        }
    }
}

function showGraphData($datemonth, $data, $position, $type = false) {
    //pr($datemonth);
    $currentPosition = $datemonth[$position];
    //pr($datemonth[$position]);
    ///pr($data);
    if (isset($data[$currentPosition])) {
        if ($type) {
            return $data[$currentPosition]['count'];
        } else {
            return env('CURRENCY_SYM') . $data[$currentPosition]['total'];
        }
    } else {
        return "-";
    }
}

function mobilityLevel($type = false) {
    $mobilityLevel = [1 => "Walking", 2 => "Walking Aides", 3 => "Wheelchair", 4 => "Can Transfer Seat to Chair", 5 => "Guided Walking"];
    if ($type) {
        return isset($mobilityLevel[$type]) ? $mobilityLevel[$type] : "-";
    } else {
        if ($type === false) {
            return $mobilityLevel;
        } else {
            return "-";
        }
    }
}

function payingBill($name = false) {
    $payingbill = array('Person Booking' => 'Person Booking', 'Client' => 'Client', 'other' => 'Other');
    $payingbill = array('Client' => 'Client', 'other' => 'Other');
    if ($name) {
        return isset($payingbill[$name]) ? $payingbill[$name] : "-";
    } else {
        return $payingbill;
    }
}

function clientName($data) {
    $finalData = array();
    foreach ($data as $dt) {
        $finalData[$dt->id] = $dt->name . " - " . $dt->address;
    }
    return $finalData;
}

function repetType($type = false) {
    $repetType = array(1 => "Never", 2 => "Weekly", 3 => "Custom");
    if ($type) {
        return isset($repetType[$type]) ? $repetType[$type] : "-";
    }
    return $repetType;
}

// function repetType($type = false) {
//     $repetType = array(1 => "Once", 2 => "Every Week", 3 => "Every Month");
//     if ($type) {
//         return isset($repetType[$type]) ? $repetType[$type] : "-";
//     }
//     return $repetType;
// }



function invoiceFeeType($type = false) {
    $feeType = array(1 => "Every Month", 2 => 'Custom');
    if ($type) {
        if ($type != 2) {
            return isset($feeType[$type]) ? $feeType[$type] : "-";
        } else {
            return "";
        }
    }
    return $feeType;
}

function getMonths($month = false, $names = false) {

    $months = array(
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December',
    );
    if ($names) {
        $data = json_decode($month);
        if (is_array($data)) {
            $months = array_flip($months);
            $result = array_intersect($months, $data);
            $months = array_flip($result);
            return(implode(", ", $months));
        }
        return "";
    } else {
        return $months;
    }
}

function getMonthsName($month = false) {

    $months = array(
        1 => 'Jan',
        2 => 'Feb',
        3 => 'Mar',
        4 => 'Apr',
        5 => 'May',
        6 => 'Jun',
        7 => 'Jul',
        8 => 'Aug',
        9 => 'Sep',
        10 => 'Oct',
        11 => 'Nov',
        12 => 'Dec',
    );
    if ($month) {
        return isset($months[$month]) ? $months[$month] : "0";
    } else {
        return $months;
    }
}

function vatCalculation($amount, $vat, $total = false) {
    $vatAmount = (( $amount * $vat) / 100);
    if ($total) {
        return $amount + $vatAmount;
    } else {
        return $vatAmount;
    }
}

function getFeeFromData($data = array(), $key) {
    $value = "Do Not";
    foreach ($data as $data) {
        if ($data->fee_id == $key) {
            $value = $data->amount;
        }
    }
    return $value;
}

function importType($type) {
    $dataType = array(1 => "Client");
    return isset($dataType[$type]) ? $dataType[$type] : "";
}

function whoPayingBill($client) {
    if ($client->paying_bill == "other") {
        $client = App\Client::find($client->payment_clientid);
        return $client->name;
    } else {
        return "Self";
    }
}

function getRepedDate($data) {
    $bookingDates[] = $data->booking_time;
    
    
    if ($data->repeat_type == 2) {
        
        
        $endDate = $data->repeat_booking_endtime ? $data->repeat_booking_endtime : \Carbon\Carbon::createFromFormat('Y-m-d H:i', $data->booking_time)->addMonths(2)->toDateTimeString();
        //$endDate = \Carbon\Carbon::now()->addMonths(1)->toDateTimeString();
        $date = array();
        $repet_times = $data->repet_times;
        foreach ($data->repet_days as $key => $repet_days) {
            $repetDate = \Carbon\Carbon::parse($data->booking_time)->modify("next $repet_days")->format('Y-m-d');
            $repetDateTime = isset($repet_times[$key]) ? $repet_times[$key] : "00:00";
            $repetDate = $repetDate . " " . $repetDateTime;
            while ($repetDate < $endDate) {
                $date[] = $repetDate;
                $repetDate = \Carbon\Carbon::parse($repetDate)->addDays(7)->toDateTimeString();
            }
        }
        $bookingDates = array_merge($bookingDates, $date);
    } else if ($data->repeat_type == 3) {
        $bookingDates = array_merge($data->repeat_booking_time, $bookingDates);
    }

    return $bookingDates;
}

function userType() {
    $userType = array(1 => "Franchisor", 2 => "Admin", 3 => "CDriver", 4 => "Users", 5 => "Companion");
    return $userType;
}

function dateDiffCalThirtyDays($date) {

    $date = \Carbon\Carbon::parse($date);
    $now = \Carbon\Carbon::now();
    $diff = $date->diffInDays($now);


    if ($date >= $now && $diff <= 45) {

        $bolone = true;
    } else if ($date < $now) {
        $bolone = true;
    } else {

        $bolone = false;
    }

    $arr = array(
        'days' => $diff,
        'condition' => $bolone
    );

    return $arr;
}

function getAutoGeneratedGroupInvoiceId() {
    $model = DB::table('booking_invoice_override')->max('invoice_id');
    if ($model) {
        return ($model + 1);
    } else {
        return 1000;
    }
}

function vatRegistrationCheck($booking_time = false) {
    $franchisees_id = session()->get('selectedFranchisees');
    $model = \App\VatReg::where('franchisees_id', $franchisees_id)->whereRaw('? between vat_reg_date and vat_de_reg_date', [$booking_time])->first();
    if ($model) {
        return true;
    } else {
        return false;
    }
}

function bookingWasMade($type=false){
	$bookingMode = [
		1=>'Phone',
		2=>'Email', 
		3=>'Person or Text'
	];
	if($type){
		return $bookingMode[$type] ? $bookingMode[$type] : "-";
	}else{
		return $bookingMode;
	}
}

function agendaFor($type=false){
    $agendaFor = [
        1 => 'Franchisee Only',
        2 => 'Admins Only', 
        3 => 'Companion Drivers', 
        //4 => '', 
        5 => 'Companions Only',
        6 => 'All Staff'
    ];
    if($type){
        return $agendaFor[$type] ? $agendaFor[$type] : "-";
    }else{
        return $agendaFor;
    }
}

function invoiceNumber($number){
    return "INV-".$number;
}