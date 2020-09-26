<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;

class ReportController extends Controller {

    function monthReport(Request $request, $month) {

        $reportDate = explode("-", $month);
        $date = Carbon::createFromDate($reportDate[1], $reportDate[0], null);
        $year = $date->year;
        $month = $date->format("F");

        $franchisees = session()->get('selectedFranchisees');
        $firstDate = new Carbon("first day of $month $year");
        $lastDate = new Carbon("last day of  $month $year");



        $period = \Carbon\CarbonPeriod::create($firstDate, $lastDate);
        $allDays = array();

        foreach ($period as $date) {
            $allDays[] = $date->format('m-d-Y');
        }





        $query = \App\Booking::select('franchisees.name', 'franchisees_id', DB::raw('count(booking.id) as count'), DB::raw('sum(final_price) as total'), DB::raw("DATE_FORMAT(booking_time,'%m-%d-%Y')  as dt"))
                ->join('franchisees', 'franchisees.id', '=', 'booking.franchisees_id')
                ->where('trip_status', 2)
                ->whereBetween('booking_time', [$firstDate, $lastDate])
                ->groupBy(DB::raw("dt"), 'franchisees_id');
        if ($franchisees) {
            $query->where('franchisees_id', $franchisees);
        }
        $bookingModel = $query->get();
        $data = array();
        foreach ($bookingModel as $model) {
            $data[$model->franchisees_id]['name'] = $model->name;
            $data[$model->franchisees_id]['data'][$model->dt] = array(
                'count' => $model->count,
                'total' => $model->total
            );
        }

        return view('admin.report.month', compact('data', 'allDays'));
    }
    
     function dayReport(Request $request, $date) {

        $reportDate = explode("-", $date);
        
        
        
        $firstDate = Carbon::createFromDate($reportDate[2], $reportDate[0], $reportDate[1])->startOfDay();
        
        $lastDate = Carbon::createFromDate($reportDate[2], $reportDate[0], $reportDate[1])->endOfDay();

        

        $franchisees = session()->get('selectedFranchisees');




        
        $allDays = range(0, 24);
        
        

        $query = \App\Booking::select('franchisees.name', 'franchisees_id', DB::raw('count(booking.id) as count'), DB::raw('sum(final_price) as total'), DB::raw("DATE_FORMAT(booking_time,'%h')  as dt"))
                ->join('franchisees', 'franchisees.id', '=', 'booking.franchisees_id')
                ->where('trip_status', 2)
                ->whereBetween('booking_time', [$firstDate, $lastDate])
                ->groupBy(DB::raw("dt"), 'franchisees_id');
        if ($franchisees) {
            $query->where('franchisees_id', $franchisees);
        }
        $bookingModel = $query->get();
        
        $data = array();
        foreach ($bookingModel as $model) {
            $data[$model->franchisees_id]['name'] = $model->name;
            $data[$model->franchisees_id]['data'][intval($model->dt)] = array(
                'count' => $model->count,
                'total' => $model->total
            );
        }
        
        return view('admin.report.day', compact('data', 'allDays'));
    }


}
