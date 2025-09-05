<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'organizer' => 'string|nullable',
            'location' => 'string|nullable',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'description' => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Event::create($data);
        return redirect()->route('admin.events.index')->with('success', 'Event created successfully');
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
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'organizer' => 'string|nullable',
            'location' => 'string|nullable',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'description' => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');

            if($event->thumbnail) {
                Storage::disk('public')->delete($event->thumbnail);
            }
        }

        $event->update($data);
        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        if ($event->thumbnail) {
            Storage::disk('public')->delete($event->thumbnail);
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully');
    }
}
