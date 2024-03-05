<!-- resources/views/comments/create.blade.php -->
{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Comment</div>

                <div class="card-body">
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="content">Comment:</label>
                            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                        </div>
                        <input type="hidden" name="post_id" value="{{ $post_id }}">

                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!-- resources/views/comments/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Comment</div>

                <div class="card-body">
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="content">Comment:</label>
                            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                        </div>
                        <input type="hidden" name="post_id" value="{{ $post->id }}">

                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

