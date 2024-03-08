{{-- views\posts\show.blade.php --}}

@extends('layouts.app')

@section('content')
    <a href="{{ route('posts.index') }}" class="btn btn-sm btn-primary"> <i class="fa-solid fa-arrow-left"></i></a>
    <div class="post-container">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <br>
        <hr>
        <!-- Display comments -->
        <div class="comments">
            <p>*Comments*</p>
            @foreach ($post->comments as $comment)
                <div class="comment">
                    <span>{{ $comment->content }}</span>
                    <small> - By: {{ $comment->user->name }}</small>
                    <div style="display: inline-block;">
                        <!-- Edit button -->
                        @if ($comment->user_id == auth()->id())
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-primary"><i
                                    class="fas fa-pencil-alt"></i>
                            </a>
                        @endif
                        @if ($comment->user_id == auth()->id())
                            <form id="deleteForm_{{ $comment->id }}" action="{{ route('comments.destroy', $comment->id) }}"
                                method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="confirmDelete({{ $comment->id }})">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endif


                    </div>
                </div>
            @endforeach
            <hr>
        </div>

        <!-- Add comment form -->
        <div class="add-comment">
            @if (auth()->check())
                <form action="{{ route('comments.store') }}" method="POST" style="display:inline-block;">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <textarea name="content" rows="2" cols="40" placeholder="Add comments here..."></textarea>
                    <button type="submit" class="btn btn-sm btn-primary mt-2">
                        <i class="fas fa-comment-dots"></i> Add Comment
                    </button>
                </form>
            @else
                <p>Please <a href="{{ route('login') }}">login</a> to add a comment.</p>
            @endif

        </div>
    </div>
    <style>
        .post-container {
            background: rgb(255, 255, 255);
            border-radius: 20px;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            min-width: 200px;
            margin: auto;
            margin-top: 20px;
        }
    </style>
    <script>
        function confirmDelete(commentId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this comment!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form for comment deletion
                    document.getElementById('deleteForm_' + commentId).submit();
                }
            });
        }
    </script>
@endsection
