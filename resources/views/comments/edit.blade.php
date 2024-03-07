<!-- resources/views/comments/edit.blade.php -->

{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Comment</div>

                    <div class="card-body">
                        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="content">Comment:</label>
                                <textarea class="form-control" id="content" name="content" rows="3">{{ $comment->content }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Comment</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

<!-- resources/views/comments/edit.blade.php -->

@extends('layouts.app')

@section('content')
<a href="{{ route('posts.show', $comment->post_id) }}" class="btn btn-sm btn-primary"> <i class="fa-solid fa-arrow-left"></i></a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Comment</div>

                    <div class="card-body">
                        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <textarea class="form-control" id="content" name="content" rows="3">{{ $comment->content }}</textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
