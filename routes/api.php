<?php

use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::group(['middleware' => ['api', 'cors']], function () {
    Route::any('driver/login', 'Api\DriverController@login');
    Route::post('drivingrequest', 'Api\DrivingRequestController@drivingRequest');
    Route::get('franchise/franchiselist', 'Api\FranchiseController@franchiselist');
    Route::post('driver/forgotpassword', 'Api\DriverController@forgotPassword');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('driver/account', 'Api\DriverController@account');
        Route::post('driver/profile-edit', 'Api\DriverController@profileEdit');
        Route::post('driver/change-password', 'Api\DriverController@changePassword');
        Route::get('driver/attendance', 'Api\DriverController@driverAttendance');
        Route::get('driver/attendancestatus', 'Api\DriverController@attendanceStatus');
        Route::post('driver/logout', 'Api\DriverController@logout');
        Route::get("driver/myearning", 'Api\DriverController@myEarning');
        Route::get("driver/myearninghistory", 'Api\DriverController@tripHistory');
        
        Route::post("driver/vehilesposition", 'Api\DriverController@changeVehilesPosition');

        Route::get('booking/list', 'Api\BookingController@bookingList');
        Route::get('booking/details', 'Api\BookingController@details');
        Route::post('booking/changestatus', 'Api\BookingController@acceptOrReject');
        Route::get('booking/acceptlist', 'Api\BookingController@myBooking');
        Route::post('booking/tripstart', 'Api\BookingController@tripStart');
        
    });
});
