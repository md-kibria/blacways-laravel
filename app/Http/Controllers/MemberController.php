<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function index()
    {
        $members = User::where('role', 'member')->orderBy('id', 'desc')->paginate(10);

        return view('admin.members.index', compact('members'));
    }

    public function show(User $user)
    {
        return view('admin.members.member', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'status' => 'nullable|in:active,rejected',
            'balance' => 'nullable'
        ]);

        if($request->status) {
            $user->status = $request->status;
        }

        if($request->balance) {
            $user->balance = $request->balance;
        }

        $user->save();

        return redirect()->route('admin.members.show', $user->id)->with('success', 'Member updated successfully.');
    }
}
