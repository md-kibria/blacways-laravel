<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function admins()
    {
        $admins = User::where('role', 'admin')->orderBy('id', 'desc')->paginate(10);

        return view('admin.admins.index', compact('admins'));
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'status' => 'required|in:active,rejected',
        ]);

        $user->status = $request->status;
        $user->save();

        return redirect()->route('admin.admins')->with('success', 'Admin status updated successfully.');
    }

    public function destroy(User $user)
    {

        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return redirect()->route('admin.admins')->with('success', 'Admin removed successfully');
    }

    public function create()
    {
        return view('admin.admins.add');
    }

    public function confirm(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        return view('admin.admins.confirm', compact('user'));
    }

    public function toggleAdmin(User $user)
    {
        if ($user->role === 'admin') {
            $user->update(['role' => 'member']);
        } else {
            $user->update(['role' => 'admin']);
        }

        return redirect()->route('admin.admins')->with('success', 'Role updated successfully');
    }

    public function profile()
    {
        $user = Auth::user();

        return view('admin.admins.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();

        return view('admin.admins.edit-profile', compact('user'));
    }

    public function updateProfile(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('profile', 'public');

            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
        }

        $user->update($data);

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
    }

    public function password()
    {
        $user = Auth::user();

        return view('admin.admins.password', compact('user'));
    }

    public function changePassword(User $user, Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!password_verify($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Password changed successfully');
    }
}
