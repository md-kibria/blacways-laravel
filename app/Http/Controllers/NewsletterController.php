<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::orderBy('id', 'desc')->paginate(10);

        return view('admin.newsletters.index', compact('newsletters'));
    }

    public function store(Request $request) {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:newsletters'
        ]);

        Newsletter::create($request->all());

        return redirect()->back()->with('success', 'Subscribed successfully');
    }

    public function destroy($id) {
        $newsletter = Newsletter::findOrFail($id);
        $newsletter->delete();

        return redirect()->back()->with('success', 'Unsubscribed successfully');
    }
}
