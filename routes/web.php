<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    //return view('index');
    return redirect(route('admin'));
});

Auth::routes();

Route::get('reset-password/{id}', 'Admin\HomeController@doResetPasswordForm')->name('reset-password');
Route::post('reset-password', 'Admin\HomeController@doResetPassword')->name('do-reset');
Route::any('forget-password', 'Admin\HomeController@doForgetPasswordForm')->name('forget-password');
Route::post('forget-password', array('uses' => 'Admin\HomeController@doForgetPassword'));





Route::get('get-vehicle-expire-date', 'Admin\CronJobController@vehicleExpiryStatus')->name('get-vehicle-expire-date');
Route::get('get-driver-expire-date', 'Admin\CronJobController@driverExpiryStatus')->name('get-driver-expire-date');
Route::get('get-company-expire-date', 'Admin\CronJobController@companyExpiryStatus')->name('get-company-expire-date');


Route::get('/insight', array('uses' => 'Admin\HomeController@index', 'middleware' => ['admin', 'permissions']))->name('admin');
Route::group(['prefix' => 'admin'], function() {
    Route::get('change-franchisees/{franchisees}', 'Admin\HomeController@changeFranchisees')->name('change-franchisees');
    Route::any('/login', 'Admin\HomeController@login')->name('adminLogin');
    Route::post('/login', 'Admin\HomeController@loginCheck')->name('adminLogin');
    Route::group(['middleware' => ['admin', 'permissions']], function() {
        Route::get("/change-password", 'Admin\UsersController@changePassword')->name('adminchangepassword');
        Route::post("/changepassword", 'Admin\UsersController@postChangePassword')->name('adminChangePasswordPost');
        //Route::get('/profile', 'Admin\HomeController@index')->name('profile');
        Route::get('/profile', 'Admin\HomeController@showProfile')->name('profile');
        Route::get('/editprofile', 'Admin\HomeController@editProfile')->name('editprofile');
        Route::any('/profile-update', 'Admin\HomeController@updateProfile')->name('profile-update');
        Route::resource('role', 'Admin\RoleController');
        Route::resource('franchisee', 'Admin\FranchiseeController');
        //Route::resource('permissions', 'Admin\PermissionController');
        Route::resource('default-permissions', 'Admin\DefaultPermissionsController');

        Route::get('/chart-report-year', "Admin\HomeController@chartReportyear")->name('chart-report-year');
        Route::get('/chart-report-month', "Admin\HomeController@chartReportmonth")->name('chart-report-month');


        Route::get('booking/completed', 'Admin\BookingController@completed')->name("booking.completed");
        Route::get('booking/cancelled', 'Admin\BookingController@cancelled')->name("booking.cancelled");
        Route::get('booking/quickCreate', 'Admin\BookingController@quickCreate')->name("booking.quick-create");

        Route::resource('booking', 'Admin\BookingController');
        Route::post('booking/vehicle/{id}', 'Admin\BookingController@vehicleAllocation')->name("booking.vehicle");
        Route::get('booking/getRepet/{id}', 'Admin\BookingController@getRepet')->name("booking.getRepet");
        Route::post('booking/repet-booking/{id}', 'Admin\BookingController@postRepetBooking')->name("booking.repet-booking");
        Route::any('get-client-list', 'Admin\BookingController@getClient')->name("get-client-list");
        Route::get('booking/cancel/{id}', 'Admin\BookingController@cancel')->name("booking.cancel");

        Route::resource('quotes', 'Admin\QuotesController');

        Route::get('approve-quote/{id}', 'Admin\QuotesController@approveQuote')->name("approve-quote");
        Route::post('submit-approve-quote', 'Admin\QuotesController@submitApproveQuote')->name("submit-approve-quote");

        Route::post('remove-insurancemsg/{id}', 'Admin\HomeController@removeInsurancemsg')->name("remove-insurancemsg");
        Route::post('remove-taxmsg/{id}', 'Admin\HomeController@removeTaxrenewalmsg')->name("remove-taxmsg");
        Route::post('remove-motmsg/{id}', 'Admin\HomeController@removeMotmsg')->name("remove-motmsg");
        Route::post('remove-drivermsg/{id}', 'Admin\HomeController@removeDrivermsg')->name("remove-drivermsg");
        Route::post('remove-driverphlmsg/{id}', 'Admin\HomeController@removeDriverPHLmsg')->name("remove-driverphlmsg");

        Route::post('remove-licenserenewal/{id}', 'Admin\HomeController@removelicenseRenewal')->name("remove-licenserenewal");
        Route::post('remove-employers-liability-insurance/{id}', 'Admin\HomeController@removeEmployersLiabilityInsurance')->name("employers-liability-insurance");
        Route::post('remove-public-liability-insurance/{id}', 'Admin\HomeController@removePublicLiabilityInsurance')->name("remove-public-liability-insurance");



        //Route::get('/quotes', 'Admin\HomeController@index')->name('quotes');

        Route::post('/change-payment-status/{any}', "Admin\BookingController@changePaymentStatus")->name('change-payment-status');
        Route::any('/update-booking', "Admin\BookingController@updateBooking")->name('update-booking');

        Route::get('searchajax', array('as' => 'searchajax', 'uses' => 'Admin\BookingController@autoComplete'));
        Route::any('booking-price', array('as' => 'booking-price', 'uses' => 'Admin\BookingController@bookinPriceDetails'));


        Route::resource('enquiry', 'Admin\EnquiryController');
        Route::any('enquery-price', array('as' => 'enquery-price', 'uses' => 'Admin\EnquiryController@enqueryPriceDetails'));



        Route::resource('events', 'Admin\EventsController');
        Route::get('/event-details/{any}', "Admin\EventsController@details")->name('event-details');


        Route::resource("client", "Admin\ClientController");
        Route::any('client-addpopup', 'Admin\ClientController@addPopup')->name('client-addpopup');
        Route::any('client-addpopup-store', 'Admin\ClientController@storePopup')->name('client-addpopup-store');


        Route::get('exportcsv', "Admin\BookingController@downloadExcel")->name("exportcsv");
        //Route::get('pdfpreview', 'Admin\ClientController@preview')->name("pdfpreview");

        Route::resource("invoice", "Admin\InvoiceController");
        Route::any('booking/markcomplete/', 'Admin\BookingController@markcomplete')->name("booking.markcomplete");

//        Route::any('booking/markcomplete/{id}', 'Admin\BookingController@markcomplete')->name("booking.markcomplete");

        Route::get('booking/invoice/{id}', 'Admin\InvoiceController@invoice')->name("invoice.invoice");
        Route::get('invoice/preview/{id}', 'Admin\InvoiceController@preview')->name("invoice.preview");
        Route::get('invoice/group-preview/{id}', 'Admin\InvoiceController@groupPreview')->name("invoice.group-preview");
        Route::any('invoice-group-invoice', 'Admin\InvoiceController@groupInvoice')->name("invoice.group-invoice");
        Route::get('uninvoiced', 'Admin\InvoiceController@uninvoiced')->name("invoice.uninvoiced");
        Route::get('invoice/download/{id}', 'Admin\InvoiceController@download')->name("invoice.download");
        Route::get('invoice/markpaid/{id}', 'Admin\InvoiceController@markPaid')->name("invoice.markpaid");
        Route::any('invoice/finalized/{id}', 'Admin\InvoiceController@finalized')->name("invoice.finalized");
        Route::any('invoicepaid', array('as' => 'invoice.paid', 'uses' => 'Admin\InvoiceController@paidInvoice'));
        Route::get('invoice/partial-payment/{id}', 'Admin\InvoiceController@partialPayment')->name("invoice.partial-payment");
        Route::any('invoice/pay-partial-payment', 'Admin\InvoiceController@payPartialPayment')->name("invoice.pay-partial-payment");
        
        //
        Route::post('invoice/update-inline' , 'Admin\InvoiceController@updateInline')->name('update-inline');
        Route::get('aged-debtors', 'Admin\InvoiceController@agedDebtors')->name("invoice.aged-debtors");
        Route::get('uninvoiced/{id}/delete', ['as' => 'cancel-bokking.delete', 'uses' => 'Admin\InvoiceController@destroy']);
        Route::any('invoice-indv-invoice/{id}', 'Admin\InvoiceController@individualInvoice')->name("invoice.indv-invoice");


        Route::post('/group-invoice-email/{any}', "Admin\InvoiceController@groupInvoiceEmail")->name('group-invoice-email');
        Route::post('/group-invoice-update-finalize', "Admin\InvoiceController@updateAndFinalize")->name('invoice.update-finalize');
        Route::post('/invoice-email', "Admin\InvoiceController@invoiceEmail")->name('invoice.invoice-email');


        Route::get("companyinfo", "Admin\CompanyInfoController@index")->name('companyinfo');
        Route::get("companyinfo-edit", "Admin\CompanyInfoController@edit")->name('companyinfo-edit');
        Route::post("companyinfo-edit", "Admin\CompanyInfoController@update")->name('companyinfo-edit');
        Route::any('companyinfo-delete/{id}', 'Admin\CompanyInfoController@directorDelete')->name("director-delete");
        Route::get("business-details", "Admin\FranchiseesPriceController@businessDetails")->name('business-details');
        Route::post("business-details-update", "Admin\FranchiseesPriceController@updateBusinessDetails")->name('business-details-update');
        


        Route::resource('email-template', 'Admin\EmailTemplateController');
        Route::resource('general-setting', 'Admin\GeneralSettingController');
        Route::resource("faq", "Admin\FaqController");


        Route::resource('franchisor', "Admin\FranchisorController");
        Route::resource('users', "Admin\UsersController");
        Route::resource('driver', "Admin\DriverController");
        Route::resource('companion', "Admin\CompanionController");
        Route::resource('franchisee-user', "Admin\FranchiseeUserController");

        Route::resource('staff', "Admin\StaffController");

        Route::any('certificate-delete/{id}', 'Admin\StaffController@certificateDelete')->name("certificate-delete");

        Route::post("staff-changepassword/{id}", "Admin\StaffController@changePassword")->name('staff-changepassword');
        Route::any("staff-changepass/{id}", "Admin\StaffController@changepassPopup")->name('staff-changepass');



        //Route::get('/allstaff', 'Admin\FranchiseeUserController@showallStaff')->name('allstaff');


        Route::resource('vehicles', "Admin\VehiclesController");
        Route::resource('driving-request', "Admin\DrivingRequestController");
        Route::resource('drivers-vehicles', "Admin\DriversVehiclesController");
        Route::resource('franchisees-price', "Admin\FranchiseesPriceController");

        Route::get('franchisor-invoice/createbulk', "Admin\FranchisorInvoiceController@createBulk")->name('franchisor-invoice.createbulk');
        Route::post('franchisor-invoice/createbulk', "Admin\FranchisorInvoiceController@createBulkPost")->name('franchisor-invoice.createbulk-post');
        Route::post('franchisor-invoice/finalised', "Admin\FranchisorInvoiceController@finalised")->name('franchisor-invoice.finalised');
        Route::resource('franchisor-invoice', "Admin\FranchisorInvoiceController");

        Route::resource('franchisor-invoiceprice', "Admin\FranchisorInvoicePriceController");
        Route::resource('teams', "Admin\TeamController");


        Route::get('franchisor-fees/create', "Admin\FranchisorInvoicePriceController@feesCreate")->name('franchisor-fees-create');
        Route::get('franchisor-fees/{id}/edit', "Admin\FranchisorInvoicePriceController@feeEdit")->name('franchisor-fees-edit');
        Route::post('franchisor-invoicefee', "Admin\FranchisorInvoicePriceController@feeStore")->name('franchisor-fees-store');
        Route::post('franchisor-invoicefee/{id}', "Admin\FranchisorInvoicePriceController@feeUpdate")->name('franchisor-fees-update');
        Route::delete('franchisor-invoicefee/{id}', "Admin\FranchisorInvoicePriceController@feeDelete")->name('franchisor-fees-delete');


        Route::get("invoice-price-details", "Admin\FranchisorInvoiceController@getInvoicePriceDetails")->name('invoice-price-details');
        Route::get('franchisor-invoice-pdf/{id}', 'Admin\FranchisorInvoiceController@invoice')->name("franchisor-invoice-pdf");


        Route::get('generate', 'Admin\FranchisorInvoiceController@generate')->name("generate");
        Route::get('generate-email', 'Admin\FranchisorInvoiceController@generateEmail')->name("generate-email");

        //  Route::post('/invoice-price-details/{any}', "Admin\FranchisorInvoiceController")->name('invoice-price-details');


        Route::get('vehicles-tracking', "Admin\VehicleTrackingController@index")->name('vehicles-tracking');
        Route::get('vehicles-tracking-ajax', "Admin\VehicleTrackingController@getCurrentPosition")->name('vehicles-tracking-ajax');



        Route::get('/calender-hasib', "Admin\HasibCalenderController@index")->name('calender-hasib');
		Route::get('/calender-getData', "Admin\HasibCalenderController@getData")->name('calender-getData');
		
		
        Route::get('/calender-week', "Admin\CalenderController@getWeekData")->name('calender.week');
        Route::get('/calender', "Admin\CalenderController@index")->name('calender');
        Route::get('/driverCalender', "Admin\CalenderController@driverCalender")->name('driver-calender');
        Route::get('/boking-details/{any}', "Admin\CalenderController@details")->name('boking-details');



        Route::get('/drivingstore/{any}', 'Admin\DrivingRequestController@drivingrequeststore')->name('drivingstore');


        //Route::get('/transport-tracker', 'Admin\BookingController@transporttracker');
        Route::get('changeVehilesPosition', "Admin\VehicleTrackingController@changeVehilesPosition");

        Route::get('/month-report/{any}', "Admin\ReportController@monthReport")->name('month-report');
        Route::get('/day-report/{any}', "Admin\ReportController@dayReport")->name('day-report');



        Route::get('import', 'Admin\ImportController@index')->name('import-index');
        Route::get('import/client', 'Admin\ImportController@client')->name('import-client');
        Route::post('import/client-post', 'Admin\ImportController@postClient')->name('import-client-post');
    });
});

Route::get('/forgotpassword-link/{id}', 'Admin\UsersController@forgotpasswordlink')->name('forgotpassword-link');
Route::post('/forgotpasswordpost', 'Admin\UsersController@postforgotpasswordpost')->name('forgotpasswordpost');

Route::get('/permission-corn', function () {
    $routeCollection = Route::getRoutes();
    foreach ($routeCollection as $value) {
        if ($value->getName()) {
            $modelAttributes = array(
                'name' => $value->getName(),
                'display_name' => $value->getName(),
                'description' => $value->getName()
            );
            \App\Permission::updateOrCreate($modelAttributes);
        }
    }
});



//
//Route::get('/import1', 'Admin\ImportController@getImport')->name('import');
//Route::get('/import1', 'Admin\ImportController@getImport')->name('import');
//Route::post('/import_parse', 'Admin\ImportController@parseImport')->name('import_parse');
////Route::post('/import_process', 'Admin\ImportController@processImport')->name('import_process');
//
