<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(News $news, Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to your account');
        }

        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'news_id' => $news->id,
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function update(Comment $comment, Request $request)
    {
        if (Auth::id() === $comment->user_id) {
            $comment->update(['comment' => $request->input('comment')]);

            return redirect()->back()->with('success', 'Comment updated successfully');
        } else {
            return redirect()->back()->with('error', 'This is not your comment');
        }
    }

    public function destroy(Comment $comment)
    {
        if (Auth::id() === $comment->user_id || Auth::user()->role === 'admin') {
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully');
        } else {
            return redirect()->back()->with('error', 'This is not your comment');
        }
    }
}
