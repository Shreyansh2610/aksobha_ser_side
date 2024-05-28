<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPayment;
use App\Models\Workshop;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserPurchase;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm(){
        $workshop = Workshop::latest()->first();
        return view('auth.register',compact('workshop'));
    }

    public function register(Request $request) {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'reg_name' => 'required|string|max:255',
            'country_code' => 'required|string|max:255',
            // 'whatsapp' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'razorpay_payment_id' => 'required',
            'reg_mob' => 'required|max:10',
            'reg_city' => 'required|max:50',
            'take_medicine' => 'required',
            // 'reg_taking_medication' => 'required',
            'reg_accept_waiver_actions' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if email already exists
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Send email to existing user
            Mail::to($user->email)->send(new \App\Mail\ExistingUserPurchase($user));
        } else {
            // Create a new user
            $password = str_replace(' ','',$request->reg_name).Carbon::now()->format('Ymd');
            $user = User::create([
                'name' => $request->reg_name,
                'email' => $request->email,
                'whatsapp_number_country_code' => $request->country_code,
                'whatsapp_number' => $request->reg_mob,
                'taking_medicine' => $request->take_medicine,
                'taking_medication' => !empty($request->reg_taking_medication)?json_encode($request->reg_taking_medication): null,
                'accept_waiver_actions' => !empty($request->reg_accept_waiver_actions)?json_encode($request->reg_accept_waiver_actions): null,
                'password' => bcrypt($password), // Generate a random password
                'city' => $request->reg_city,
            ]);

            // Send email to new user with purchase info and password
            Mail::to($user->email)->send(new NewUserPurchase($user,$password));
        }

        // Handle the payment response from Razorpay
        $razorpayPaymentId = $request->input('razorpay_payment_id');

        if ($razorpayPaymentId) {
            UserPayment::create([
                'user_id' => $user->id,
                'workshop_id' => $request->workshop_id,
                'payment_id' => $razorpayPaymentId,
            ]);
            return redirect()->route('login');
        }

        // Redirect back with an error message if payment verification fails
        return redirect()->back()->withErrors(['message' => 'Payment verification failed.']);
    }
}
