{{-- views\posts\index.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="content-box">
                    <h1>List of Posts</h1>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
                    <div class="row">
                        @forelse($posts as $post)
                            <div class="col-md-4 mb-3">
                                <div class="card shadow-lg p-3 mb-3 bg-body rounded">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $post->title }}</h4>
                                        <p class="card-content">{{ $post->content }}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Post By: {{ $post->user->name }}</li>
                                        <li class="list-group-item">{{ $post->user->created_at}}</li>
                                    </ul>
                                    <div class="card-body">
                                        {{-- <h4 class="card-title">{{ $post->title }}</h4>
                                        <p class="card-content">{{ $post->content }}</p> --}}
                                        <div class="d-flex justify-content-start align-items-center">
                                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> View
                                            </a>

                                            @if (Auth::check() && Auth::id() == $post->user_id)
                                                <div class="btn-group" role="group">
                                                    {{-- <a href="{{ route('posts.edit', $post->id) }}"><button
                                                            class="btn btn-primary btn-sm ms-1">Edit</button></a> --}}
                                                    <a href="{{ route('posts.edit', $post->id) }}"
                                                        class="btn btn-primary btn-sm ms-1">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>

                                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                        class="bg-light">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm delete-btn ms-1">
                                                            <i class="fas fa-trash-alt"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="alert alert-info" role="alert">
                                    No posts found
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <style>
    .card{}
</style> --}}