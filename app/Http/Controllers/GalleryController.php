<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = GalleryCategory::orderBy('id', 'desc')->paginate(10);
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = GalleryCategory::all();
        return view('admin.gallery.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'category_id' => 'required|string|max:255',
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
        $galleries = Gallery::orderBy('id', 'desc')->where('category_id', $id)->paginate(12);
        return view('admin.gallery.show', compact('galleries'));
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

    public function createCategory()
    {
        return view('admin.gallery.create-category');
    }

    public function saveCategory(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('gallery_category', 'public');
        }

        GalleryCategory::create($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Added successfully');
    }

    public function editCategory(GalleryCategory $cat)
    {
        return view('admin.gallery.edit-category', compact('cat'));
    }

    public function updateCategory(Request $request, GalleryCategory $cat)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($cat->thumbnail) {
                Storage::disk('public')->delete($cat->thumbnail);
            }
            $cat->thumbnail = $request->file('thumbnail')->store('gallery_category', 'public');
        }

        $cat->title = $request->title ?? $cat->title;
        $cat->description = $request->description ?? $cat->description;

        $cat->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Updated successfully');
    }

    public function deleteCategory(GalleryCategory $cat)
    {

        if ($cat->thumbnail) {
            Storage::disk('public')->delete($cat->thumbnail);
        }

        $cat->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Deleted successfully');
    }
}
