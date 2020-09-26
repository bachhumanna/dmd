<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
#use App\Events;
use App\ViewsDetails;
use Illuminate\Support\Facades\DB;
use App\User;
use Validator;
use App\DrivingRequest;
use App\Vehicles;
use Carbon\Carbon;
use App\DrivingDetails;
use App\Franchisee;

class HomeController extends Controller {

    public function index() {
        if (Auth::user()->user_type == 2) {

            return $this->franchisee();
        } else {
            if (session()->has('selectedFranchisees')) {
                return $this->franchisee();
            } else {
                return $this->franchisor();
            }
        }
    }

    public function franchisee() {
        $selectedFranchisees = selectedFranchisees();
        $franchiseeModel = \App\Franchisee::findOrFail($selectedFranchisees);

        $driverCount = User::Franchisee()->where('user_type', 3)->count();
        $vehicles = Vehicles::Franchisee()->count();
        $clientCount = \App\Client::Franchisee()->count();
        $bookingCount = $this->bookingCount();


        $driverDetails = $this->getDriverExSoon();
        $getInsuranceRenewalDate = $this->getInsuranceRenewalDate();
        $getcompamyexpiry = $this->getCompanyExSoon();
        
        $today = \Carbon\Carbon::now()->format("Y-m-d");
        $todaysBooking =  \App\Booking::Franchisee()->whereRaw('DATE(booking_time) = ?', [$today])->orderBy('booking_time')->limit(10)->get();
        
        
        
        return view('admin.home.franchisee', compact('clientCount', 'driverCount', 'franchiseeCount', 'vehicles', 'bookingCount', 'driverDetails', 'getInsuranceRenewalDate', 'franchiseeModel', 'insurancenotice', 'getcompamyexpiry','todaysBooking'));
    }

    public function franchisor() {
        $driverCount = User::Franchisee()->where('user_type', 3)->count();
        $franchiseeCount = \App\Franchisee::count();
        $vehicles = Vehicles::Franchisee()->count();
        $bookingCount = $this->bookingCount();
        $client = \App\Client::Franchisee()->count();
        $totalFranchiseRevenue = \App\Booking::Franchisee()->sum('final_price');
        return view('admin.home.franchisor', compact('driverCount', 'franchiseeCount', 'vehicles', 'bookingCount', 'client', 'totalFranchiseRevenue'));
    }

    private function getDriverExSoon() {

        $driverDetails = DrivingDetails::with('user')->whereHas('user', function($q) {
                    $q->franchisee();
                })->where(function($q) {
                    $q->where('renewal_date', 1)->orWhere('renewal_status', 1);
                })->get();
        return $driverDetails;
    }

    private function getInsuranceRenewalDate() {

        $driverDetails = Vehicles::franchisee()
                        ->where(function($query) {
                            $query->orWhere("mot_status", 1);
                            $query->orWhere('tax_renewal_status', 1);
                            $query->orWhere('insurance_status', 1);
                        })->get();

        return $driverDetails;
    }

    public function getCompanyExSoon() {
        $query = Franchisee::fra()->with('companyInfo')
                ->where(function($query) {
            $query->orwhere('franchise_license_renewal_status', 1);
            $query->orWhere('employers_liability_insurance_status', 1);
            $query->orWhere('public_liability_insurance_status', 1);
        });
        $models = $query->get();
        return $models;
    }

    private function bookingCount() {
        $franchisees = session()->get('selectedFranchisees');
        $query = \App\Booking::where('trip_status', 2);
        if ($franchisees) {
            $query->where('franchisees_id', $franchisees);
        }
        return $query->count();
    }

    public function login() {
        if (Auth::check()) {
            return redirect(route('admin'));
        }
        return view('admin.home.login');
    }

    public function loginCheck(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect(route('admin'));
        } else {
            return redirect()->back()->withInput()->with(['error' => 'Enter valid username and password.']);
        }
    }

    public function changeFranchisees($franchisees) {
        if ($franchisees) {
            session()->put('selectedFranchisees', $franchisees);
        } else {
            session()->forget('selectedFranchisees');
        }
        return redirect()->back();
    }

    public function showProfile() {
        $users = User::find(Auth::user()->id);
        if ($users) {

            return view('admin.home.profile', compact('users'));
        } else {
            abort(404, 'Page not found');
        }
    }

    public function editProfile() {
        $users = User::find(Auth::user()->id);
        return view('admin.home.editprofile', compact('users'));
    }

    public function updateProfile(Request $request) {
        $id = Auth::user()->id;
        $this->validate($request, [
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|numeric',
            'address' => 'required|min:5|max:255',
            
        ]);

        $input = $request->all();
        $model = User::find(Auth::user()->id);
        $model->update($input);
        $request->session()->flash('success', 'Profile has been Successfull update!');
        return redirect(route('profile'));
    }

    public function chartReportyear(Request $request) {


        $franchisees = session()->get('selectedFranchisees');
        $todayYear = Carbon::now()->subYear(1)->startOfDay();
        $yearMonth = array();
        $dat = new Carbon($todayYear->toDateString());
        for ($i = 0; $i < 12; $i++) {
            $yearMonth[] = $dat->addMonth()->format('m-Y');
        }
        $today = Carbon::now();
        $query = \App\Booking::select('franchisees.name', 'franchisees_id', DB::raw('count(booking.id) as count'), DB::raw('sum(final_price) as total'), DB::raw("DATE_FORMAT(booking_time,'%m-%Y')  as dt"))
                ->join('franchisees', 'franchisees.id', '=', 'booking.franchisees_id')
                ->where('trip_status', 2)
                ->whereBetween('booking_time', [$todayYear, $today])
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
        return view('admin.home.chartreportyear', compact('data', 'yearMonth'));
    }

    public function chartReportmonth(Request $request) {


        $franchisees = session()->get('selectedFranchisees');
        $firstDate = new Carbon('first day of last month');
        $lastDate = new Carbon('last day of last month');

        $lastthirtydays = \Carbon\Carbon::today()->subDays(30);

        $lastthirtydays = \Carbon\Carbon::today()->subDays(30);
        $today = \Carbon\Carbon::today();

        $period = \Carbon\CarbonPeriod::create($lastthirtydays, $today);

        $allDays = array();
        // Iterate over the period
        foreach ($period as $date) {
            $allDays[] = $date->format('m-d-Y');
        }

        $query = \App\Booking::select('franchisees.name', 'franchisees_id', DB::raw('count(booking.id) as count'), DB::raw('sum(final_price) as total'), DB::raw("DATE_FORMAT(booking_time,'%m-%d-%Y')  as dt"))
                ->join('franchisees', 'franchisees.id', '=', 'booking.franchisees_id')
                ->where('trip_status', 2)
                ->where('booking_time', '>', $lastthirtydays)
                //->whereBetween('booking_time', [$firstDate, $lastDate])
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
        return view('admin.home.chartreportmonth', compact('data', 'allDays'));
    }

    function removeInsurancemsg($id) {
        $model = Vehicles::findOrFail($id);
        $model->update(array('insurance_status' => 0));
        \session()->flash('success', 'Removed!');
        return redirect()->back();
    }

    function removeTaxrenewalmsg($id) {
        $model = Vehicles::findOrFail($id);
        $model->update(array('tax_renewal_status' => 0));
        \session()->flash('success', 'Removed!');
        return redirect()->back();
    }

    function removeMotmsg($id) {
        $model = Vehicles::findOrFail($id);
        $model->update(array('mot_status' => 0));
        \session()->flash('success', 'Removed!');
        return redirect()->back();
    }

    function removeDrivermsg($id) {
        $model = DrivingDetails::findOrFail($id);
        $model->update(array('renewal_status' => 0));
        \session()->flash('success', 'Removed!');
        return redirect()->back();
    }

    function removeDriverPHLmsg($id) {
        $model = DrivingDetails::findOrFail($id);
        $model->update(array('phl_expiry_status' => 0));
        \session()->flash('success', 'Removed!');
        return redirect()->back();
    }

    function removelicenseRenewal($id) {
        $model = Franchisee::findOrFail($id);
        $model->update(array('franchise_license_renewal_status' => 0));
        \session()->flash('success', 'Removed!');
        return redirect()->back();
    }

    function removeEmployersLiabilityInsurance($id) {
        $model = Franchisee::findOrFail($id);
        $model->update(array('employers_liability_insurance_status' => 0));
        \session()->flash('success', 'Removed!');
        return redirect()->back();
    }

    function removePublicLiabilityInsurance($id) {
        $model = Franchisee::findOrFail($id);
        $model->update(array('public_liability_insurance_status' => 0));
        \session()->flash('success', 'Removed!');
        return redirect()->back();
    }

    public function doForgetPasswordForm() {
        return view('admin.home.forgotPassword');
    }

    public function doForgetPassword(Request $request) {

        $rules = array(
            'email' => 'required',
        );
        $validator = Validator::make($request->all(), $rules); //pr($validator);exit;
        if ($validator->fails()) {
            return redirect()->route('forget-password')->withErrors($validator, 'Forgot')->withInput();
        } else {
            $user = \App\User::where('email', $request->email)->first();
            if (!$user) {

                $request->session()->flash('status', 'This Mail Id does not exist in our records !');
                return redirect()->route('forget-password')->withErrors($validator, 'Forgot')->withInput();
            } else {
                $secret = \Crypt::encrypt($user->id);
                $url = url("/") . "/reset-password/" . $secret; //echo $url;exit;

                \Mail::send('emails.reset-password', ['url' => $url, 'user' => $user], function ($m) use ($url, $user) {
                    $swiftMessage = $m->getSwiftMessage();
                    $headers = $swiftMessage->getHeaders();
                    $headers->addTextHeader('x-mailgun-native-send', 'true');
                    $m->from('info@drivingmissdaisy.com', 'DMD');

                    $m->to($user->email)->subject('Reset Password');
                });

                $request->session()->flash('status', 'Please check your mail to reset your password.');
                return redirect()->route('forget-password');
            }
        }
    }

    public function doResetPasswordForm($secret) {

        return view('admin.home.reset', array("secret" => $secret));
    }

    public function doResetPassword(Request $request) {
        $rules = array(
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'Reset');
        } else {

            $id = \Crypt::decrypt($request->get('secret'));
            $model = \App\User::find($id);
            if ($model) {
                $password = $request->get('password');
                $modelAttribute = array();
                $modelAttribute['password'] = \Hash::make($password);
                if ($model->update($modelAttribute)) {
                    $request->session()->flash('status', 'Your password has been reset successfully !');
                    return redirect(route('admin'));
                } else {
                    $request->session()->flash('status', 'Oops something went wrong try again !');
                    return redirect(route('admin'));
                }
            } else {
                $request->session()->flash('status', 'Oops something went wrong try again !');
                return redirect(route('admin'));
            }
        }
    }

}
