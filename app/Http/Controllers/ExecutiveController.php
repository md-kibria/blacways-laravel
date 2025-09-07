<?php

namespace App\Http\Controllers;

use App\Models\Executive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExecutiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $executives = Executive::orderBy('id', 'desc')->paginate(10);
        return view('admin.executives.index', compact('executives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.executives.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'position' => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Executive::create($data);
        return redirect()->route('admin.executives.index')->with('success', 'Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $executive = Executive::findOrFail($id);
        return view('admin.executives.edit', compact('executive'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $executive = Executive::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');

            if ($executive->image) {
                Storage::disk('public')->delete($executive->image);
            }
        }

        $executive->update($data);

        return redirect()->route('admin.executives.index')->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $executive = Executive::findOrFail($id);

        if ($executive->thumbnail) {
            Storage::disk('public')->delete($executive->thumbnail);
        }

        $executive->delete();

        return redirect()->route('admin.executives.index')->with('success', 'Deleted successfully');
    }
}
