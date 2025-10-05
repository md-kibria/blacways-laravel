<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassMail;
use App\Models\PasswordReset;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function signup()
    {
        session()->put('previousUrl', session()->get('previousUrl') ?? url()->previous());

        return view('auth.signup');
    }

    public function register(Request $request)
    {
        // Handle the signup logic here
        // For example, validate the request data and create a new user
        $validatedData = $request->validate([
            // 'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        // Create the user
        User::create([...$validatedData, 'name' => 'NULL']);
        Profile::create(['user_id' => User::where('email', $validatedData['email'])->first()->id]);
        
        // Log the user in
        Auth::login(User::where('email', $validatedData['email'])->first());


        // $previousUrl = session()->get('previousUrl');
        // if ($previousUrl) {
        //     session()->forget('previousUrl'); // Clean up session
        //     return redirect($previousUrl)->with('success', 'Account created successfully!');
        // }

        return redirect()->route('profile.edit')->with('success', 'Account created successfully!');
    }

    public function login()
    {
        session()->put('previousUrl', url()->previous());

        return view('auth.login');
    }

    public function auth(Request $request)
    {
        // Handle the login logic here
        // For example, validate the request data and authenticate the user
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {

            $previousUrl = session()->get('previousUrl');
            if ($previousUrl) {
                session()->forget('previousUrl'); // Clean up session
                return redirect($previousUrl)->with('success', 'Logged in successfully!');
            }

            return redirect()->route('home')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout()
    {
        // Handle the logout logic here
        Auth::logout();

        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }

    public function resetReq()
    {
        return view('auth.reset-req');
    }

    public function resetPost(Request $request)
    {
        // Handle the password reset request logic here
        $validatedData = $request->validate([
            'email' => 'required|string|email|exists:users,email',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);

        $user = User::where('email', $validatedData['email'])->first();
        if (!$user) {
            return back()->withErrors(['email' => 'No user found with this email address.']);
        }
        
        $token = bin2hex(random_bytes(16));
        PasswordReset::create([
            'email' => $validatedData['email'],
            'token' => $token,
        ]);
        Mail::to($validatedData['email'])->send(new ResetPassMail($token));

        // Mail::to('mrdev774@gmail.com')->send(new ResetPassMail($token));

        return back()->with('success', 'We have emailed your password reset link!');
    }

    public function resetPassword(Request $request)
    {
        $token = $request->query('token');
        if(!$token){
            return redirect()->route('reset-req')->with('error', 'Invalid or missing token.');
        }
        return view('auth.reset-password', compact('token'));
    }

    public function resetPasswordStore(Request $request)
    {
        $validatedData = $request->validate([
            'token' => 'required|string|exists:password_resets,token',
            'password' => 'required|string|min:8|confirmed',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);

        $passwordReset = PasswordReset::where('token', $validatedData['token'])->where('status', 'not used')->first();
        if (!$passwordReset) {
            return back()->with('error' ,'Invalid or already used token.');
        }

        // Check if the token is expired (valid for 24 hours)
        if (now()->diffInHours($passwordReset->created_at) > 24) {
            return back()->with('error', 'This token has expired. Please request a new password reset.');
        }

        $user = User::where('email', $passwordReset->email)->first();
        if (!$user) {
            return back()->with('error', 'No user found with this email address.');
        }

        $user->password = bcrypt($validatedData['password']);
        $user->save();

        // Mark the token as used
        $passwordReset->status = 'used';
        $passwordReset->save();

        return redirect()->route('login')->with('success', 'Your password has been reset successfully!');
    }
}
