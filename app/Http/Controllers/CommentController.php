<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
    // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to add a comment.');
        }

        $request->validate([
            'content' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);

        // Create a new comment using the Comment model
        Comment::create([
            'content' => $request->content,
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }


    public function edit(Comment $comment)
    {
        if ($comment->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to edit this comment.');
        }

        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        if ($comment->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to update this comment.');
        }

        $request->validate([
            'content' => 'required',
        ]);

        $comment->update([
            'content' => $request->content,
        ]);
        // return redirect()->back('posts.show');
        // return redirect()->back()->with('success', 'Comment updated successfully.');
        return redirect()->route('posts.show', $comment->post_id)->with('success', 'Comment updated successfully.');


    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }

        $comment->delete();

        return redirect()->back()->with('danger', 'Comment deleted successfully.');
    }
}
