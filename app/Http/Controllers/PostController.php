<?php

// App\Http\Controllers\API\PostController.php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
      public function index(): View
    {
        // dd('hii');
        // return view('posts.index', [
        //     'posts' => DB::table('posts')->paginate(5)
        // ]);
       
        $posts = Post::orderBy('id', 'DESC')->paginate(6);
        return view('posts.index', compact('posts'));
    }

    // Show details of a specific post
    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }

    // Allow users to create a new post
    public function create()
    {
        return view('posts.create');
    }
  

    public function store(Request $request)
    {
        // $posts = Post::where('title', '>', 100)->cursorPaginate(15);
            $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->id();
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    // Allow users to edit their own posts
    public function edit(Post $post): View
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // : RedirectResponse
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    // Allow users to delete their own posts
    public function destroy(Post $post)
    {
        // : RedirectResponse
        $post->delete();
        return redirect()->route('posts.index')->with('danger', 'Post deleted successfully');
    }
}
