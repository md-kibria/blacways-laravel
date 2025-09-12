<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index() {
        $messages = Message::orderBy('id', 'desc')->paginate(10);

        return view('admin.messages.index', compact('messages'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        Message::create($request->all());

        return redirect()->back()->with('success', 'Message send successfully');
    }

    public function show($id) {
        $message = Message::findOrFail($id);
        $message->is_read = true;
        $message->save();

        return view('admin.messages.show', compact('message'));
    }
    public function destroy($id) {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully');
    }
}
