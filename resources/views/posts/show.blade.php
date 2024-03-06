{{-- views\posts\show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="post-container">
    <h2>{{ $post->title }}</h2>

    <p>{{ $post->content }}</p>
    <hr>
    <!-- Display comments -->
    <div class="comments">
        <p>*Comments*</p>
        @foreach ($post->comments as $comment)
            <div class="comment">
                <span>{{ $comment->content }}</span>
                <small> - By: {{ $comment->user->name }}</small>
                <div>
                    <!-- Edit button -->
                    @if ($comment->user_id == auth()->id())
                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
                    @endif
                    <!-- Delete button -->
                    @if ($comment->user_id == auth()->id())
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
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
            <textarea name="content" rows="2" cols="40" placeholder="Add comments here..."></textarea>
            <button type="submit" class="btn btn-sm btn-primary mt-2">
                <i class="fas fa-comment-dots"></i> Add Comment
            </button>
            
        </form>
    </div>
</div>
@endsection





<style>
    .post-container {
        background: rgb(255, 255, 255);
        border-radius: 20px;
         box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.1); 
        padding: 20px;
        max-width: 400px; 
        margin: auto; 
        margin-top: 20px; 
    }
</style>


