
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
                            <textarea class="form-control" id="content" name="content" rows="5"></textarea>
                        </div> <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(isset($post))
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="content-box shadow p-4">
                        <h2>Post Details</h2>
                        <p><strong>Title:</strong> {{ $post->title }}</p>
                        <div id="shortenedContent">
                            <p><strong>Content:</strong> {{ shortenContent($post->content) }}</p>
                            <button id="viewFullContent" class="btn btn-link">View Full Content</button>
                        </div>
                        <div id="fullContent" style="display: none;">
                            <p><strong>Content:</strong> {{ $post->content }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('viewFullContent').addEventListener('click', function() {
                document.getElementById('shortenedContent').style.display = 'none';
                document.getElementById('fullContent').style.display = 'block';
            });
        });

        function shortenContent(content) {
            var words = content.split(' ');
            if (words.length > 50) {
                return words.slice(0, 50).join(' ') + '...';
            }
            return content;
        }
    </script> --}}
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

{{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas saepe tenetur, exercitationem sed ducimus corporis tempora earum soluta aperiam inventore blanditiis illum nemo iure aliquam veritatis expedita ratione. Blanditiis, debitis.2 --}}