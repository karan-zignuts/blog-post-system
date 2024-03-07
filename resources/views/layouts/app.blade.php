<!DOCTYPE html>
<html>

<head>
    <title>Blog Post System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <style>
        body {
            background: #c9cdd2;
            height: 100%;
        }

        .footer {
            position: initial;
            margin-top: 50px;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            padding: 10px 0;
        }
    </style>

</head>

<body>
    {{-- @include('layouts.navigation') --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('posts.index') }}">Blog Post System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Home</a>
                    </li>                    
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.myposts') }}">Myposts</a>
                    </li>
                    @endauth
                </ul>
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </ul>
                
            </div>
        </div>
    </nav>

    <!-- Display success message -->
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
        @elseif(session('danger'))
            <div class="alert alert-danger" id="dangerMessage">
                {{ session('danger') }}
            </div>
        @endif
    </div>

    <!-- Content Area -->
    <div class="container mt-4 w-75">
        @yield('content')
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                        <svg class="bi" width="30" height="24">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                    </a>
                    <span class="mb-3 text-muted text-center">© 2022 Company, Inc</span>
                </div>
            </div>
        </div>
    </footer>
    <script>
      
        document.addEventListener('DOMContentLoaded', function() {
            // Delay closing the success message
            setTimeout(function() {
                var successMessage = document.getElementById('successMessage');
                if (successMessage) {
                    successMessage.style.display = 'none';
                }
            }, 2000);

            // Delay closing the danger message
            setTimeout(function() {
                var dangerMessage = document.getElementById('dangerMessage');
                if (dangerMessage) {
                    dangerMessage.style.display = 'none';
                }
            }, 2000);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        
    </script>

</html>
