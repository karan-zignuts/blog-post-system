{{-- views\posts\index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="content-box">
                    <h1>List of Posts</h1>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
                    <ul class="list-group">
                        @forelse($posts as $post)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>{{ $post->title }}</span>
                                    <div class="btn-group" role="group" aria-label="Post Actions">
                                        <a href="{{ route('posts.show', $post->id) }}"><button
                                                class="btn btn-info btn-sm">View</button></a>
                                        @if (Auth::check() && Auth::id() == $post->user_id)
                                            <a href="{{ route('posts.edit', $post->id) }}"><button
                                                    class="btn btn-primary btn-sm ms-1">Edit</button></a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                class="ms-1 bg-light">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger btn-sm delete-btn">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item">No posts found</li>
                        @endforelse
                    </ul>
                    <div>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





<style>
    .content-box {
        background: rgba(255, 255, 255, 0.8);
        border-radius: 20px;
        box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.1),
            -20px -20px 50px rgba(255, 255, 255, 0.5);
        padding: 20px;
    }
</style>
