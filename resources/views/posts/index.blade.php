{{-- views\posts\index.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center h-100">
            <div class="col-md-12">
                <div class="content-box">
                    <h1>List of Posts</h1>
                    <div class="row">
                        @forelse($posts as $post)
                            <div class="col-md-4 mb-3">
                                <div class="card shadow-lg p-3 mb-3 bg-body rounded">
                                    <div class="card-body">
                                        <div class="card-title" style="overflow: hidden; max-height: 100px;">
                                            <h4>{{ $post->title }}</h4>
                                        </div>
                                        <div class="card-content" style="overflow: hidden; max-height: 100px;">
                                            <p>{{ Str::limit($post->content, 100) }}</p>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                       <li class="list-group-item"><small> Post By: {{ $post->user->name }}</small></li>
                                        <li class="list-group-item"><small>{{ $post->user->created_at }}</small></li>
                                    </ul>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-start align-items-center">
                                            <a href="{{ route('posts.show', $post->id) }}" style="text-decoration:none">
                                                Read more -->
                                            </a>
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


