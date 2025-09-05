<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\ForumComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function forum()
    {
        $posts = Forum::where('is_approved', true)->orderBy('id', 'desc')->paginate(12);

        return view('pages.forum', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['is_approved'] = true;

        Forum::create($data);
        return redirect()->back()->with('success', 'Your post has been submitted');
    }

    public function show(Forum $forum)
    {

        $forum->update(['views' => $forum->views + 1]);

        return view('pages.post', compact('forum'));
    }

    public function destroy(Forum $forum)
    {
        if (Auth::id() === $forum->user_id || Auth::user()->role === 'admin') {
            $forum->delete();
            return redirect()->route('forum')->with('success', 'Forum post deleted successfully');
        } else {
            return redirect()->back()->with('error', 'You are not authorized to delete this post');
        }
    }

    public function self()
    {
        $posts = Forum::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(12);

        return view('pages.forum', compact('posts'));
    }

    public function comment(Forum $forum, Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to your account');
        }

        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        ForumComment::create([
            'user_id' => Auth::id(),
            'forum_id' => $forum->id,
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function comment_update(ForumComment $comment, Request $request)
    {
        if (Auth::id() === $comment->user_id) {
            $comment->update(['comment' => $request->input('comment')]);

            return redirect()->back()->with('success', 'Comment updated successfully');
        } else {
            return redirect()->back()->with('error', 'This is not your comment');
        }
    }

    public function comment_destroy(ForumComment $comment)
    {
        if (Auth::id() === $comment->user_id || Auth::user()->role === 'admin') {
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully');
        } else {
            return redirect()->back()->with('error', 'This is not your comment');
        }
    }

    public function index()
    {
        $posts = Forum::orderBy('id', 'desc')->paginate(10);

        return view('admin.forum.index', compact('posts'));
    }

    public function change_approve(Forum $forum)
    {
        if ($forum->is_approved) {
            $forum->is_approved = false;
        } else {
            $forum->is_approved = true;
        }


        $forum->save();

        return redirect()->route('admin.forum.index')->with('success', 'Updated successfully.');
    }

    public function admin_destroy(Forum $forum)
    {
        $forum->delete();
        return redirect()->route('admin.forum.index')->with('success', 'Forum post deleted successfully');
    }
}
