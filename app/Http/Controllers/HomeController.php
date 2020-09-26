<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogs;
use App\Http\Requests\UserRegisterForm;
use App\User;
use App\Howitworks;
use DB;
use App\EmailTemplate;
use DbView;
use Mail;
use Auth;
use PDF;
class HomeController extends Controller {

    public function __construct() {
        //  $this->middleware('auth');
    }

    public function index(Request $request) {
        
    }

    public function contactus(Request $request) {
        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required'
            ];
            $this->validate($request, $rules);

            // Mail To Admin
            $template = EmailTemplate::find(2);
            if ($template) {
                $replaceData = array(
                    'name' => $request->name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'message' => $request->message,
                );
                $content = DbView::make($template)->with($replaceData)->render();
                $contact_email = getConfigValue('contact_email');
                $contact_email = "rahamanh939@gmail.com";
                Mail::send('emails.contact', ['content' => $content], function ($message) use ($template, $contact_email) {
                    $message->to($contact_email, config('app.name', 'Laravel'))
                            ->subject($template->subject)
                            ->from($template->from_email, $template->from_name);
                });
            }

            //Mail To Users

            $template = EmailTemplate::find(1);
            if ($template) {
                $replaceData = array(
                    'name' => $request->name,
                );
                $content = DbView::make($template)->with($replaceData)->render();
                $contact_email = $request->email;
                $name = $request->name;
                Mail::send('emails.contact', ['content' => $content], function ($message) use ($template, $contact_email, $name) {
                    $message->to($contact_email, $name)
                            ->subject($template->subject)
                            ->from($template->from_email, $template->from_name);
                });
            }



            $request->session()->flash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');


            return redirect(route('contact-us'));
        }
        $pages = getPageData(4);
        return view('contactus', compact('pages'));
    }

    public function thankyou($url) {
        return view('thankyou', compact('url'));
    }

    public function getSignup() {
        if (Auth::user()) {
            return redirect(route('dashboard'));
        }
        $model = \App\SubscriptionPlan::find(2);
        return view('signup', ['model' => $model]);
    }

    public function postSignup(UserRegisterForm $request) {
        DB::beginTransaction();
        try {
            $subscription = \App\SubscriptionPlan::where('subscription_type', 2)->first();

            $input = $request->all();
            $input['user_type'] = 4;
            $input['password'] = bcrypt($request->password);
            $input['dob'] = \Carbon\Carbon::parse($request->dob)->format('Y-m-d');
            $input['amount'] = $subscription->value;
            $input['user_ip'] = $request->ip();
            $user = User::create($input);
            $customer = $user->createAsStripeCustomer($request->stripetoken, [
                'email' => $user->email,
            ]);
            //$subscription = \App\SubscriptionPlan::where('subscription_type',2)->first();

            $subscriptionAmount = ($subscription->value * 100);
            $charge = $user->charge($subscriptionAmount, [
                'currency' => env('CURRENCY_CODE'),
                'description' => $subscription->description
            ]);
            $user->next_billing_date = calculateExpDate($subscription->validity_for);
            $user->save();
            DB::commit();


            $template = EmailTemplate::find(7);
            if ($template) {
                $pdfFileName = time().$user->id . '.pdf';
                $subscription = \App\SubscriptionPlan::where('subscription_type', 2)->first();
                $pdf = PDF::loadView('pdf.invoice', compact('subscription','user','customer'));
                $pdf->save(public_path('invoice/'.$pdfFileName));

                $url = route('verifyemail', ['id' => encrypt($user->id)]);
                $content = DbView::make($template)->with(['name' => $user->name, 'url' => $url])->render();
                Mail::send('emails.contact', ['content' => $content], function ($message) use ($template, $user, $pdfFileName) {
                    $message->to($user->email, $user->name)
                            ->attach(public_path('invoice/'.$pdfFileName), [
                                'as' => 'invoice.pdf',
                                'mime' => 'application/pdf',
                            ])
                            ->subject($template->subject)
                            ->from($template->from_email, $template->from_name);
                });
            }

            return redirect(route('thank-you', ['id' => encrypt($user->id)]));
        } catch (\Stripe\Error\Card  $e) {
            DB::rollback();
            $request->session()->flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function ipNotAuthorized() {
        return view('ip-not-authorized');
    }

    public function verifyemail($url) {
        $pk = decrypt($url);
        $user = User::findOrFail($pk);
        $user->status = 1;
        $user->save();
        return view('verifyemail');
    }

    public function resendVerification($url) {
        $template = EmailTemplate::find(12);
        if ($template) {
            $pk = decrypt($url);
            $user = User::findOrFail($pk);
          //  pr($user);
            if ($user) {
                $url = route('verifyemail', ['id' => encrypt($user->id)]);
                $content = DbView::make($template)->with(['name' => $user->name, 'url' => $url])->render();
                Mail::send('emails.contact', ['content' => $content], function ($message) use ($template, $user) {
                    $message->to($user->email, $user->name)
                            ->subject($template->subject)
                            ->from($template->from_email, $template->from_name);
                });
                return response()->json(['response' => 1,'message' =>'Verification link has been sent successfully']);
            }else{
                return response()->json(['response' => 0, 'message' => 'Please try again',]);
            }
        }
    }

}
