<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile() {
        $user = User::findOrFail(Auth::id());
        
        return view('pages.profile', compact('user'));
    }
    
    public function edit() {
        $user = User::findOrFail(Auth::id());
        
        return view('pages.profile-update', compact('user'));
    }

    public function update(User $user, Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'old_password' => 'nullable:password|string|min:8',
            'password' => 'nullable|string|min:8',
        ]);

        if ($request->filled('password')) {
            if (!password_verify($request->old_password, $user->password)) {
                return back()->withErrors(['old_password' => 'The provided old password does not match our records.'])->withInput();
            }
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('image')) {
            $user->image = $request->file('image')->store('profile', 'public');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');

    }
}
