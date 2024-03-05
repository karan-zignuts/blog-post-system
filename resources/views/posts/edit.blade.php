
{{-- views\posts\edit.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-box glassmorphic p-4">
            <h1>Edit Post</h1>
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control mb-3" id="content" name="content" rows="3">{{ $post->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
@endsection


<style>
    .glassmorphic {
    background: rgba(255, 255, 255, 0.8);
    border-radius: 15px;
    box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.1),
                -10px -10px 30px rgba(255, 255, 255, 0.5);
}

</style>

