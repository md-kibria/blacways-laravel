<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'desc')->paginate(12);
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'src' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('src')) {
            $data['src'] = $request->file('src')->store('gallery', 'public');
        }

        Gallery::create($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Added successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->src) {
            Storage::disk('public')->delete($gallery->src);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Deleted successfully');
    }
}
