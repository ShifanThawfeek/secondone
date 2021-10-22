<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Mail\CancelEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Plan;
use Stripe\Stripe;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public $stripe;

    public function __construct() 
    {
        Stripe::setApiKey(env('STRIPE_KEY'));
    }

    public function index()
    {
        return view('payments.plans');
    }

    public function subscribe(Request $request) 
    {
        $user = $request->user();
        $paymentMethod = $request->payment_method;

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $stripe->paymentMethods->attach(
            $paymentMethod, ['customer' => auth()->user()->stripe_id]
        );


        if ($request->type == "student") {
            $request->user()->newSubscription
            ('PREMIUM', env('PREMIUM_PRICE'))
            // ->withCoupon('bZSYFQOg')
            ->withCoupon('rT8r8ddB')
            ->create($paymentMethod, ['email' => $user->email]);
        } else {
            $request->user()->newSubscription
            ('PREMIUM', env('PREMIUM_PRICE'))
            // ->withCoupon('Jf89Y9UZ')
            ->withCoupon($request->coupon)
            ->create($paymentMethod, ['email' => $user->email]);
        }
        
        $user->update(['is_subscribed' => true]);
        
        // email notification for Premium users "thank you" when they sign up for PRO
        $data = [
            'title' => 'Title goes here',
            'content' => 'Content goes here'
        ];

        // One year free coupon code - Email notification
        if($request->coupon == env('ONEYEARFREEE_COUPON') ){
            Mail::send('emails.coupon_applied', $data, function ($message) {
                $email = Auth::user()->email;
                $name = Auth::user()->name;
                $message->to($email, $name)->subject('Welcome to Moja.link');
            });
        }

                // RM 9.90 for students - Email notification
                elseif ('rT8r8ddB') {
                    # code...
                    Mail::send('emails.student_purchase', $data, function ($message) {
                        $email = Auth::user()->email;
                        $name = Auth::user()->name;
                        $message->to($email, $name)->subject('Welcome to Moja.link');
                    });
                }
        
        // Premium RM 18 Subscription - Email notification
        else{
            Mail::send('emails.test', $data, function ($message) {
                $email = Auth::user()->email;
                $name = Auth::user()->name;
                $message->to($email, $name)->subject('Welcome to Moja.link');
            });
        }

        return response()->json(['subscribed' => true]);
    }

    public function getFeedback(Request $request) {
        Mail::to(env('CANCEL_EMAIL'))->send(new CancelEmail($request->all()));
        return "Cancelation feedback received successfully.";
    }

    public function cancel()
    {
        $user = auth()->user();
        $user->subscription('PREMIUM')->cancelNow();
        return response(true);
    }
}
