<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workshop;
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        dd('Re');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm(){
        $workshop = Workshop::latest()->first();
        return view('auth.register',compact('workshop'));
    }

    public function register(Request $request) {
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'reg_name' => 'required|string|max:255',
            'country_code' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'razorpay_payment_id' => 'required',
            'reg_mob' => 'required|max:10',
            'reg_city' => 'required|max:50',
            'take_medicine' => 'required',
            'reg-taking-medication' => 'required',
            'reg-accept-waiver-actions' => 'required',
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
            $password = str_random(8);
            $user = User::create([
                'name' => $request->name,
                'whatsapp' => $request->whatsapp,
                'email' => $request->email,
                'password' => bcrypt($password), // Generate a random password
            ]);

            // Send email to new user with purchase info and password
            Mail::to($user->email)->send(new NewUserPurchase($user));
        }

        // Handle the payment response from Razorpay
        $razorpayPaymentId = $request->input('razorpay_payment_id');

        if ($razorpayPaymentId) {
            // Logic to verify the payment using Razorpay API
            // (e.g., verify signature, fetch payment details, etc.)

            // Assuming verification is successful, redirect to a success page
            return redirect()->route('register.success');
        }

        // Redirect back with an error message if payment verification fails
        return redirect()->back()->withErrors(['message' => 'Payment verification failed.']);
    }
}
