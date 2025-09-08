<?php

namespace App\Http\Controllers;

use App\Models\Council;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CouncilController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $councils = Council::orderBy('id', 'desc')->paginate(10);
        return view('admin.council.index', compact('councils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.council.create');
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
            'about' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Council::create($data);
        return redirect()->route('admin.council.index')->with('success', 'Created successfully');
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
        $council = Council::findOrFail($id);
        return view('admin.council.edit', compact('council'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $council = Council::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string',
            'about' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');

            if ($council->image) {
                Storage::disk('public')->delete($council->image);
            }
        }

        $council->update($data);

        return redirect()->route('admin.council.index')->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $council = Council::findOrFail($id);

        if ($council->image) {
            Storage::disk('public')->delete($council->image);
        }

        $council->delete();

        return redirect()->route('admin.council.index')->with('success', 'Deleted successfully');
    }
}
