<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vehicles;

class VehicleTrackingController extends Controller {

    public function index() {
        $vehicles = Vehicles::franchisee()->get();
        $marker = array();
        foreach ($vehicles as $vehicle) {
            $marker[] = [
                $vehicle->vehicles_number,
                $vehicle->lat,
                $vehicle->lng,
                "<div class='info_content'><p>$vehicle->vehicles_model $vehicle->vehicles_company $vehicle->vehicles_number </p></div>"
            ];
        }
        return view('admin.vehicle-tracking.index', compact('marker'));
    }

    public function getCurrentPosition() {
        $vehicles = Vehicles::franchisee()->get();
        $marker = array();
        foreach ($vehicles as $vehicle) {
            $marker[] = [
                $vehicle->vehicles_number,
                $vehicle->lat,
                $vehicle->lng,
                "<div class='info_content'><p>$vehicle->vehicles_model $vehicle->vehicles_company $vehicle->vehicles_number </p></div>"
            ];
        }
        return response()->json([
                    'status' => 'true',
                    'data' => $marker
        ]);
    }

    public function changeVehilesPosition() {

        $vehicles = Vehicles::get();
        foreach ($vehicles as $car) {
            $lat = rand(100000, 5555);
            $lng = rand(100000, 5555);
            Vehicles::where('id', $car->id)->update([
                "lat" => "22." . $lat,
                "lng" => "88." . $lng,
            ]);
        }
    }

}
