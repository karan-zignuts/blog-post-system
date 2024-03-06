
{{-- views\posts\create.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="content-box shadow p-4">
                    <h1>Create New Post</h1>
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


<style>
.content-box {
    background: rgb(255, 255, 255);
            border-radius: 20px;
            box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.1),
                        -20px -20px 50px rgba(255, 255, 255, 0.5);
            padding: 20px;
}

</style>