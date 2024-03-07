{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center h-100">
            <div class="col-md-12">
                <div class="content-box">
                    <h1>List of Posts</h1>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
                    <div class="row">
                        @forelse($posts as $post)
                            @if (Auth::check() && Auth::id() == $post->user_id)
                                <div class="col-md-4 mb-3">
                                    <div class="card shadow-lg p-3 mb-3 bg-body rounded">
                                        <div class="card-body">
                                            <div class="card-title" style="overflow: hidden; max-height: 100px;">
                                                <h4>{{ $post->title }}</h4>
                                            </div>
                                            <div class="card-content" style="overflow: hidden; max-height: 100px;">
                                                <p>{{ Str::limit($post->content, 50) }}</p>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Post By: {{ $post->user->name }}</li>
                                            <li class="list-group-item">{{ $post->user->created_at }}</li>
                                        </ul>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('posts.edit', $post->id) }}"
                                                        class="btn btn-primary btn-sm ms-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                        class="bg-light">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm  ms-1 ">
                                                            <i class="fas fa-trash-alt"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
@endsection --}}


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center h-100">
            <div class="col-md-12">
                <div class="content-box">
                    <h1>List of Posts</h1>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
                    <div class="row">
                        @forelse($posts as $post)
                            @if (Auth::check() && Auth::id() == $post->user_id)
                                <div class="col-md-4 mb-3">
                                    <div class="card shadow-lg p-3 mb-3 bg-body rounded">
                                        <div class="card-body">
                                            <div class="card-title" style="overflow: hidden; max-height: 100px;">
                                                <h4>{{ $post->title }}</h4>
                                            </div>
                                            <div class="card-content" style="overflow: hidden; max-height: 100px;">
                                                <p>{{ Str::limit($post->content, 50) }}</p>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Post By: {{ $post->user->name }}</li>
                                            <li class="list-group-item">{{ $post->user->created_at }}</li>
                                        </ul>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('posts.edit', $post->id) }}"
                                                        class="btn btn-primary btn-sm ms-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <!-- SweetAlert confirmation dialog and delete form -->
                                                    <form id="deleteForm_{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="POST" class="bg-light">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm ms-1" onclick="confirmDelete({{ $post->id }})">
                                                            <i class="fas fa-trash-alt"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
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

    <script>
        function confirmDelete(postId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this post!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form for post deletion
                    document.getElementById('deleteForm_' + postId).submit();
                }
            });
        }
    </script>
@endsection

