<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\HomepageContent;
use App\Models\Info;
use App\Models\Media;
use App\Models\News;
use App\Models\Page;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPageController extends Controller
{
    public function admin()
    {
        return redirect()->route('admin.dashboard');
    }

    public function dashboard()
    {
        $newsCount = News::count();
        $eventCount = Event::count();
        $userCount = User::where('role', 'member')->count();

        $users = User::where('role', 'member')->orderBy('id', 'desc')->limit(5)->get();
        $events = Event::orderBy('id', 'desc')->limit(5)->get();


        return view('admin.dashboard', compact('newsCount', 'eventCount', 'userCount', 'users', 'events'));
    }

    public function homePage()
    {
        $homepageContent = HomepageContent::all();

        return view('admin.pages.home', compact('homepageContent'));
    }

    public function homePageSliders()
    {
        $slides = Slide::all();

        return view('admin.pages.home-sliders', compact('slides'));
    }

    public function slideStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'link' => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('slides', 'public');
        }

        Slide::create($data);

        return redirect()->back()->with('success', 'Slide added successfully');
    }

    public function slideUpdate(Slide $slide, Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'link' => 'required|string',
        ]);

        $data = $request->all();

        // Handle file uploads
        if ($request->hasFile('image')) {
            // Check and delete previous image if a new one is provided
            if ($slide->image) {
                Storage::delete($slide->image);
            }
            $data['image'] = $request->file('image')->store('slides', 'public');
        }

        $slide->update($data);

        return redirect()->back()->with('success', 'Slide updated successfully');
    }

    public function slideDestroy(Slide $slide)
    {
        if ($slide->image) {
            Storage::delete($slide->image);
        }

        $slide->delete();
        return redirect()->back()->with('success', 'Slide deleted successfully');
    }

    public function homePageUpdate(Request $request)
    {
        $request->validate([
            'section' => 'required',
        ]);

        $homepageContent = HomepageContent::firstOrNew(['section' => $request->section]);

        $data = $request->all();

        // Handle file uploads
        if ($request->hasFile('image')) {
            // Check and delete previous image if a new one is provided
            if ($homepageContent->image) {
                Storage::delete($homepageContent->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('image_helper')) {
            // Check and delete previous image if a new one is provided
            if ($homepageContent->image_helper) {
                Storage::delete($homepageContent->image_helper);
            }
            $data['image_helper'] = $request->file('image_helper')->store('images', 'public');
        }

        $homepageContent->update($data);

        return redirect()->back()->with('success', 'Homepage content updated successfully');
    }

    public function aboutPage()
    {
        $page = Page::where('slug', 'about')->first();
        return view('admin.pages.about', compact('page'));
    }

    public function aboutPageUpdate(Request $request)
    {

        $request->validate([
            'slug' => 'required',
            'content' => 'required',
        ]);
        $page = Page::firstOrNew(['slug' => $request->slug]);
        $page->update(['content' => $request->content]);

        return redirect()->back()->with('success', 'Page updated successfully');
    }

    public function page(Page $page)
    {
        return view('admin.pages.page', compact('page'));
    }

    public function pageUpdate(Request $request, Page $page)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'visible' => 'nullable|boolean'
        ]);

        $data = $request->all();
        $data['visible'] = $request->has('visible') ? true : false;

        $page->update($data);
        return redirect()->back()->with('success', 'Page updated successfully');
    }

    public function settings()
    {
        $info = Info::find(1);
        $medias = Media::all();

        return view('admin.settings', compact('info', 'medias'));
    }

    public function settingUpdate(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,ico|max:2048',
            'description' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'ad' => 'nullable|string',
            'ad_visibility' => 'nullable|string',
            'nl_vid' => 'nullable|string',
            'street_address' => 'nullable|string',
            'suite' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'zip' => 'nullable|string',
            'country' => 'nullable|string',
        ]);

        $siteInfo = Info::firstOrNew(['id' => 1]);
        // Check and delete previous logo if a new one is provided
        if ($request->hasFile('logo')) {
            if ($siteInfo->logo) {
                Storage::delete($siteInfo->logo);
            }
            $siteInfo->logo = $request->file('logo')->store('logos', 'public');
        }
        
        if ($request->hasFile('footer_logo')) {
            if ($siteInfo->footer_logo) {
                Storage::delete($siteInfo->footer_logo);
            }
            $siteInfo->footer_logo = $request->file('footer_logo')->store('footer_logos', 'public');
        }

        // Check and delete previous favicon if a new one is provided
        if ($request->hasFile('favicon')) {
            if ($siteInfo->favicon) {
                Storage::delete($siteInfo->favicon);
            }
            $siteInfo->favicon = $request->file('favicon')->store('favicons', 'public');
        }

        $siteInfo->title = $request->title ?? $siteInfo->title;
        $siteInfo->description = $request->description ?? $siteInfo->description;
        $siteInfo->email = $request->email ?? $siteInfo->email;
        $siteInfo->phone = $request->phone ?? $siteInfo->phone;
        $siteInfo->address = $request->address ?? $siteInfo->address;
        $siteInfo->ad = $request->ad ?? $siteInfo->ad;
        $siteInfo->ad_visibility = $request->has('ad_visibility') ? true : false;
        $siteInfo->nl_vid = $request->nl_vid ?? $siteInfo->nl_vid;
        $siteInfo->street_address = $request->street_address ?? $siteInfo->street_address;
        $siteInfo->suite = $request->suite ?? $siteInfo->street_address;
        $siteInfo->city = $request->city ?? $siteInfo->street_address;
        $siteInfo->state = $request->state ?? $siteInfo->street_address;
        $siteInfo->zip = $request->zip ?? $siteInfo->street_address;
        $siteInfo->country = $request->country ?? $siteInfo->street_address;

        $siteInfo->save();

        return redirect()->back()->with('success', 'Settings updated successfully');
    }

    public function settingMediaUpdate(Request $request)
    {
        $socialMediaPlatforms = ['facebook', 'youtube', 'twitter', 'tiktok', 'instagram'];

        foreach ($socialMediaPlatforms as $platform) {
            $url = $request->input($platform);

            // Find or create the media record
            $media = Media::firstOrNew(['name' => $platform]);
            $media->url = $url;
            $media->save();
        }

        return redirect()->back()->with('success', 'Social media links updated successfully');
    }
}
