{{-- views\posts\show.blade.php --}}

{{-- @extends('layouts.app')
@section('content')
    <div class="post-container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
    </div>
@endsection --}}


<!-- resources/views/posts/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="post-container">
    <p><b>Title:-{{ $post->title }}</b></p>
    <p>Content:-{{ $post->content }}</p>
    <hr>
    <!-- Display comments -->
    <div class="comments">
        <p>*Comments*</p>
        @foreach ($post->comments as $comment)
            <div class="comment">
                <span>{{ $comment->content }}</span>
                <small>By: {{ $comment->user->name }}</small>
                <div>
                    <!-- Edit button -->
                    @if ($comment->user_id == auth()->id())
                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    @endif
                    <!-- Delete button -->
                    @if ($comment->user_id == auth()->id())
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
        <hr>
    </div>

    <!-- Add comment form -->
    <div class="add-comment">
        <p>*Add Comment*</p>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="content" rows="4"></textarea>
            <button type="submit" class="btn btn-sm btn-primary">Add Comment</button>
        </form>
    </div>
</div>
@endsection




<style>
    .post-container {
        background: rgba(255, 255, 255, 0.8);
        border-radius: 20px;
        box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.1),
                    -10px -10px 20px rgba(255, 255, 255, 0.5);
        padding: 20px;
        max-width: 400px; /* Set maximum width for smaller size */
        margin: auto; /* Center the container horizontally */
        margin-top: 20px; /* Add some top margin for spacing */
    }

    .post-container h1 {
        font-size: 1.5rem; /* Set smaller font size for the title */
    }

    .post-container p {
        font-size: 1rem; /* Set smaller font size for the content */
    }
</style>


