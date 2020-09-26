<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Calendar;
use App\Booking;
use App\Events;

class CalenderController extends Controller {

    public function index() {
       
        $events = [];
        $eventsList = [];
        if (selectedFranchisees()) {
            $bookingModel = Booking::with(['users', 'pickupLocationCalender','pickupLocationTravelTime'])->Franchisee()
                    ->where('booking_or_quotes',1)
                    ->get();
           
            foreach ($bookingModel as $booking) {

                $events[] = \Calendar::event(
                            $booking->client->name, false, new \DateTime($booking->StartBookingTime), new \DateTime($booking->totalBookingDuration), $booking->id, 
                            [
                                'color' => getColorBookingCalender($booking->users->user_type, $type = 'B'),
                                'type' => 1,
                            ]
                );
                
                if ($booking->journey_type == 2 && $booking->long_return == 1) {
                    
                    $returnStartDate = new \Carbon\Carbon($booking->journey_return_date);
                    $returnStartDate->subMinute($booking->drop_off_to_base_time);
                    
                    $returnEndDate = new \Carbon\Carbon($booking->journey_return_date);
                    $returnEndDate->addMinute($booking->dropLocation->travel_time);                    
                    
                    $events[] = \Calendar::event(
                                //$booking->order_id, false, new \DateTime($booking->StartBookingTime), new \DateTime($booking->totalBookingDuration), $booking->id,
                                $booking->order_id, false, new \DateTime($returnStartDate), new \DateTime($returnEndDate), $booking->id, 
                                [
                                'color' => getColorBookingCalender($booking->users->user_type, $type = 'RB'),
                                'type' => 1,
                                    ]
                    );                    
                }
            }
        }
        if (isSuperAdmin()) {
            if (selectedFranchisees()) {
                $eventsList = \App\Events::
                        where('franchisees_id', selectedFranchisees())
                        ->orWhere('event_for', 2)
                        ->get();
            } else {
                $eventsList = \App\Events::whereNull('franchisees_id')->get();
                //$eventsList = \App\Events::where('event_for',6)->orWhere("event_for",$userType)->get();
            }
        } else {
            $franchisees_id = session()->get('selectedFranchisees');
            $eventsList = \App\Events::with('users')
                    ->where('franchisees_id', $franchisees_id)
                    ->orWhere('event_for', 2)
                    ->get();

            //pr($eventsList->toarray());exit;
        }

        foreach ($eventsList as $list) {
            $events[] = \Calendar::event(
                            $list->name, false, new \DateTime($list->posted_date), new \DateTime($list->posted_date), $list->id, [
                        //'color' => getColor($list->id),
                        'color' => getColorBookingCalender(@$list->users->user_type, $type = 'A'),
                        'type' => 2,
                            #'url' => 'pass here url and any route',
                            ]
            );
        }

        //pr($events);exit;

        $calendar = \Calendar::addEvents($events)
                ->setOptions([
                    'id'=>"asdas",
                    'firstDay' => 1,
                    'slotLabelFormat' => 'HH:mm',
                    'header' => [
                        'left' => 'prev, next today', 'center' => 'title',
                        'right' => 'month,agendaWeek,agendaDay,listMonth'
                    ]
                ])
                ->setCallbacks([
                'eventClick' => 'function(event) {
                    openEventPopup(event)                          
                }'
        ]);

        //pr($calendar);exit;
        return view('admin.calender.index', compact('calendar'));
    }

    public function details(Request $request, $id) {

        $model = Booking::with('pickupLocation')->findOrFail($id);
        return view('admin.calender.details', compact('model'));
    }

    public function driverCalender(Request $request) {        
        $query = \App\User::franchisee()->where('user_type', 3)
                ->with('driverBooking.client');
        
        if($request->driver_id){
            $query->where('id', $request->driver_id);
        }
        
//                ->with(['driverBooking' => function($q) {
//                    $q->where('id', '54');
//                }])
                
                
        $models = $query->get();
        $allDriver = \App\User::franchisee()->where('user_type', 3)->pluck('username','id');
        $resources = array();
        $events = array();
        foreach ($models as $model) {
            $resources[] = array(
                'id' => $model->id,
                'title' => $model->FullName
            );
            
            foreach ($model->driverBooking as $driverBooking) {
                $events[] = array(
                    'id' => $driverBooking->id,
                    "resourceId" => $model->id,
                    //"start" => '2018-11-16T02:00:00', 
                    "start" => date("Y-m-d\TH:i:s", strtotime($driverBooking->booking_time)),
                    "end" => date("Y-m-d\TH:i:s", strtotime($driverBooking->booking_time)),
                    "title" => $driverBooking->client->name,
                    'type' => 1,
                );
                
                
                if ($driverBooking->journey_type == 2 && $driverBooking->long_return == 1) {
                    
                    $returnStartDate = new \Carbon\Carbon($driverBooking->journey_return_date);
                    $returnStartDate->subMinute($driverBooking->drop_off_to_base_time);
                    
                    $returnEndDate = new \Carbon\Carbon($driverBooking->journey_return_date);
                    $returnEndDate->addMinute($driverBooking->dropLocation->travel_time);
                    
                    $events[] = array(
                        'id' => $driverBooking->id."-100",
                        "resourceId" => $model->id,
                        "start" => date("Y-m-d\TH:i:s", strtotime($returnStartDate)),
                        "end" => date("Y-m-d\TH:i:s", strtotime($returnEndDate)),
                        "title" => $driverBooking->client->name,
                        'color' => getColorBookingCalender($driverBooking->users->user_type, $type = 'RB'),
                        'type' => 2,
                    );
                } 
            }
        }
        return view('admin.calender.driver-calender', compact('resources', 'events','allDriver'));
    }

}
