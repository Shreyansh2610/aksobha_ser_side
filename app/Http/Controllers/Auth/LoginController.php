<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
{
    // Validate the request
    $request->validate([
        'email' => 'required|string',
        'password' => 'required|string',
    ]);

    // Attempt to find the user by username
    $user = User::where('email', $request->email)->first();
    // dd($user);
    // Check if the user exists
    if (!$user) {
        return redirect()->route('login')->with(['error' => 'Invalid credentials']);
    }

    // Check if the password is correct
    if (Hash::check($request->password, $user->password)) {
        // Authentication successful, login the user
        Auth::login($user);

        // Redirect to the desired route
        return redirect()->intended('/');
    }

    // Authentication failed, return an error response
    return redirect('/login')->with(['error' => 'Invalid credentials']);
}

public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/login');
    }

}
