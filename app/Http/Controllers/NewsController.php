<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderBy('id', 'desc')->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        News::create($data);
        return redirect()->route('admin.news.index')->with('success', 'News created successfully');
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
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');

            if($news->thumbnail) {
                Storage::disk('public')->delete($news->thumbnail);
            }
        }

        $news->update($data);
        return redirect()->route('admin.news.index')->with('success', 'News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);

        if ($news->thumbnail) {
            Storage::disk('public')->delete($news->thumbnail);
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully');
    }
}
