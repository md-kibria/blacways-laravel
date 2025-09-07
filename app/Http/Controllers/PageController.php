<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Executive;
use App\Models\Gallery;
use App\Models\HomepageContent;
use App\Models\Info;
use App\Models\News;
use App\Models\Page;
use App\Models\Slide;
use Illuminate\Http\Request;
use Pest\Collision\Events;

class PageController extends Controller
{
    public function index()
    {
        $info = Info::find(1);

        $header = HomepageContent::where('section', 'header')->first();
        $features_1 = HomepageContent::where('section', 'features_1')->first();
        $features_2 = HomepageContent::where('section', 'features_2')->first();
        $features_3 = HomepageContent::where('section', 'features_3')->first();
        $about = HomepageContent::where('section', 'about')->first();
        $mission = HomepageContent::where('section', 'mission')->first();
        $donation = HomepageContent::where('section', 'donation')->first();
        $slides = Slide::all();
        $news_desc = Page::where('slug', 'news')->select('description')->first()->description;
        $news = News::where('status', 'published')->orderBy('id', 'desc')->limit(4)->get();
        
        $events_desc = Page::where('slug', 'events')->select('description')->first()->description;
        $events = Event::orderBy('id', 'desc')->limit(2)->get();

        return view('pages.home', compact('header', 'info', 'features_1', 'features_2', 'features_3', 'about', 'mission', 'donation', 'news_desc', 'news', 'events_desc', 'events', 'slides'));
    }

    public function about()
    {
        $page = Page::where('slug', 'about')->first();

        return view('pages.about', compact('page'));
    }
    
    public function mission()
    {
        $page = Page::where('slug', 'mission')->first();

        return view('pages.mission', compact('page'));
    }
    
    public function features($slug)
    {
        $page = Page::where('slug', $slug)->first();

        return view('pages.features', compact('page'));
    }

    public function contact()
    {
        $page = Page::where('slug', 'contact')->first();
        $info = Info::find(1);

        return view('pages.contact', compact('page', 'info'));
    }

    public function news()
    {
        $news = News::where('status', 'published')->orderBy('id', 'desc')->paginate(12);
        $page = Page::where('slug', 'news')->first();

        return view('pages.news', compact('news', 'page'));
    }

    public function newsItem(News $news)
    {
        return view('pages.newsItem', compact('news'));
    }

    public function executives()
    {
        $executives = Executive::orderBy('id', 'desc')->paginate(12);
        $page = Page::where('slug', 'executives')->first();

        return view('pages.executives', compact('executives', 'page'));
    }

    public function events()
    {
        $events = Event::all()->map(function ($event) {
            return [
                'id'    => $event->id,
                'title' => $event->title,
                'start' => $event->start_time ? \Carbon\Carbon::parse($event->start_time)->toDateString() : null,
                'end'   => $event->end_time ? \Carbon\Carbon::parse($event->end_time)->toDateString() : null,
                'extendedProps' => [
                    'description' => $event->description,
                    'location'    => $event->location,
                    'organizer'   => $event->organizer,
                    'status'      => $event->status, // from your accessor
                ]
            ];
        });

        $page = Page::where('slug', 'events')->first();

        return view('pages.events', compact('events', 'page'));
    }

    public function event(Event $event)
    {
        return view('pages.event', compact('event'));
    }

    public function gallery()
    {
        $images = Gallery::orderBy('id', 'desc')->paginate(12);
        $page = Page::where('slug', 'gallery')->first();

        return view('pages.gallery', compact('images', 'page'));
    }
}
