<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        // Create the user
        User::create($validatedData);

        // Log the user in
        Auth::login(User::where('email', $validatedData['email'])->first());


        $previousUrl = session()->get('previousUrl');
        if ($previousUrl) {
            session()->forget('previousUrl'); // Clean up session
            return redirect($previousUrl)->with('success', 'Account created successfully!');
        }

        return redirect()->route('home')->with('success', 'Account created successfully!');
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
}
