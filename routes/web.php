<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CouncilController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExecutiveController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/mission', [PageController::class, 'mission'])->name('mission');
Route::get('/features/{slug}', [PageController::class, 'features'])->name('features');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/news/{news}', [PageController::class, 'newsItem'])->name('news.show');
Route::get('/executives', [PageController::class, 'executives'])->name('executives');
Route::get('/council', [PageController::class, 'council'])->name('council');

Route::get('/donations', [DonationController::class, 'index'])->name('donation');
Route::post('/donations/create', [DonationController::class, 'create'])->name('donations.create');
Route::get('/donations/success', [DonationController::class, 'success'])->name('donations.success');
// Route::get('/donations/success', [DonationController::class, 'complete'])->name('donations.success');
// Route::get('/donations/cancel', function () {
//     return 'Donation canceled.';
// })->name('donations.cancel');

Route::post('/news/{news}/comment', [CommentController::class, 'store'])->name('news.comment.store');
Route::put('/news/comment/{comment}/update', [CommentController::class, 'update'])->name('news.comment.update');
Route::delete('/news/comment/{comment}/destroy', [CommentController::class, 'destroy'])->name('news.comment.destroy');

Route::get('/events-calendar', [PageController::class, 'events'])->name('events');
Route::get('/events', [PageController::class, 'eventsList'])->name('events.list');
Route::get('/events/{event}', [PageController::class, 'event'])->name('event');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{cat}', [PageController::class, 'galleryCategory'])->name('gallery.cat');

Route::post('/message', [MessageController::class, 'store'])->name('message.store');
Route::post('/newsletters', [NewsletterController::class, 'store'])->name('newsletters.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/update', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{user}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/forum', [ForumController::class, 'forum'])->name('forum');
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{forum}', [ForumController::class, 'show'])->name('forum.show');
    Route::delete('/forum/{forum}', [ForumController::class, 'destroy'])->name('forum.destroy');
    Route::get('/forum/member/{user}', [ForumController::class, 'self'])->name('forum.self');

    Route::post('/forum/{forum}/comment', [ForumController::class, 'comment'])->name('forum.comment.store');
    Route::put('/forum/comment/{comment}/update', [ForumController::class, 'comment_update'])->name('forum.comment.update');
    Route::delete('/forum/comment/{comment}/destroy', [ForumController::class, 'comment_destroy'])->name('forum.comment.destroy');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [AdminPageController::class, 'admin'])->name('admin');
    Route::get('/dashboard', [AdminPageController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('/news', NewsController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.news.index',
            'create' => 'admin.news.create',
            'store' => 'admin.news.store',
            'edit' => 'admin.news.edit',
            'update' => 'admin.news.update',
            'destroy' => 'admin.news.destroy',
        ]);

    Route::resource('/events', EventController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.events.index',
            'create' => 'admin.events.create',
            'store' => 'admin.events.store',
            'edit' => 'admin.events.edit',
            'update' => 'admin.events.update',
            'destroy' => 'admin.events.destroy',
        ]);

    Route::resource('/gallery', GalleryController::class)
        ->except(['edit', 'update'])
        ->names([
            'index' => 'admin.gallery.index',
            'show' => 'admin.gallery.show',
            'create' => 'admin.gallery.create',
            'store' => 'admin.gallery.store',
            'destroy' => 'admin.gallery.destroy',
        ]);
    Route::get('/gallery/category/create', [GalleryController::class, 'createCategory'])->name('admin.gallery.category.create');
    Route::post('/gallery/category/store', [GalleryController::class, 'saveCategory'])->name('admin.gallery.category.store');
    Route::get('/gallery/category/edit/{cat}', [GalleryController::class, 'editCategory'])->name('admin.gallery.category.edit');
    Route::put('/gallery/category/update/{cat}', [GalleryController::class, 'updateCategory'])->name('admin.gallery.category.update');
    Route::delete('/gallery/category/destroy/{cat}', [GalleryController::class, 'deleteCategory'])->name('admin.gallery.category.destroy');

    Route::post('/upload-image', [GalleryController::class, 'upload'])->name('admin.gallery.upload');

    Route::resource('/executives', ExecutiveController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.executives.index',
            'create' => 'admin.executives.create',
            'store' => 'admin.executives.store',
            'edit' => 'admin.executives.edit',
            'update' => 'admin.executives.update',
            'destroy' => 'admin.executives.destroy',
        ]);

    Route::resource('/council-elders', CouncilController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.council.index',
            'create' => 'admin.council.create',
            'store' => 'admin.council.store',
            'edit' => 'admin.council.edit',
            'update' => 'admin.council.update',
            'destroy' => 'admin.council.destroy',
        ]);

    Route::get('/forum-posts', [ForumController::class, 'index'])->name('admin.forum.index');
    Route::put('/forum-posts/{forum}', [ForumController::class, 'change_approve'])->name('admin.forum.update');
    Route::delete('/forum-posts/{forum}', [ForumController::class, 'admin_destroy'])->name('admin.forum.destroy');

    Route::get('/home-page', [AdminPageController::class, 'homePage'])->name('admin.home');
    Route::post('/home-page', [AdminPageController::class, 'homePageUpdate'])->name('admin.home.update');
    Route::get('/home-page/sliders', [AdminPageController::class, 'homePageSliders'])->name('admin.home.sliders');
    Route::post('/home-page/sliders', [AdminPageController::class, 'slideStore'])->name('admin.home.sliders.store');
    Route::put('/home-page/sliders/{slide}', [AdminPageController::class, 'slideUpdate'])->name('admin.home.sliders.update');
    Route::get('/home-page/sliders/destroy/{slide}', [AdminPageController::class, 'slideDestroy'])->name('admin.home.sliders.destroy');

    Route::get('/about-page', [AdminPageController::class, 'aboutPage'])->name('admin.about');
    Route::post('/page-update', [AdminPageController::class, 'aboutPageUpdate'])->name('admin.page.update');

    Route::get('/pages/{page:slug}', [AdminPageController::class, 'page'])->name('admin.pages');
    Route::put('/pages/update/{page:slug}', [AdminPageController::class, 'pageUpdate'])->name('admin.pages.update');

    Route::get('/members', [MemberController::class, 'index'])->name('admin.members');
    Route::get('/members/{user}', [MemberController::class, 'show'])->name('admin.members.show');
    Route::put('/members/{user}', [MemberController::class, 'update'])->name('admin.members.update');
    Route::delete('/members/{user}', [MemberController::class, 'update'])->name('admin.members.destroy');

    Route::get('/settings', [AdminPageController::class, 'settings'])->name('admin.settings');
    Route::post('/settings-update', [AdminPageController::class, 'settingUpdate'])->name('admin.settings.update');
    Route::post('/settings-media-update', [AdminPageController::class, 'settingMediaUpdate'])->name('admin.settings.media.update');

    Route::get('/messages', [MessageController::class, 'index'])->name('admin.messages');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('admin.messages.show');

    Route::get('/newsletters', [NewsletterController::class, 'index'])->name('admin.newsletters');
    Route::delete('/newsletters/{id}', [NewsletterController::class, 'destroy'])->name('admin.newsletters.destroy');

    Route::get('/donations', [DonationController::class, 'admin'])->name('admin.donations');

    Route::get('/admins', [AdminController::class, 'admins'])->name('admin.admins');
    Route::put('/admins/{user}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admins/destroy/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admins/add', [AdminController::class, 'create'])->name('admin.admins.add');
    Route::get('/admins/add/confirm', [AdminController::class, 'confirm'])->name('admin.admins.add.confirm');
    Route::put('/admins/add/confirm/{user}', [AdminController::class, 'toggleAdmin'])->name('admin.admins.add.confirm.toggle');

    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/profile/{user}', [AdminController::class, 'editProfile'])->name('admin.profile.edit');
    Route::put('/profile/update/{user}', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

    Route::get('/password', [AdminController::class, 'password'])->name('admin.profile.password');
    Route::put('/password/{user}', [AdminController::class, 'changePassword'])->name('admin.profile.password.update');

    // Route::post('/upload-image', [GalleryController::class, 'upload'])->name('admin.gallery.upload');
});
