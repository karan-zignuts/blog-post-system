<!DOCTYPE html>
<html>

<head>
    <title>Blog Post System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <style>
        body {
            background: #c9cdd2;
            height: 100%;
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
                            <a class="nav-link" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-RKJ3b0Pxi0I5LtfM4JvN7PcVlGyTq/0Gx1r1QaXepkX6U0aPPZhndDQ1azqL6bUZ" crossorigin="anonymous"></script>
    <script>
        // Delay closing the success message
        setTimeout(function () {
            document.getElementById('successMessage').style.display = 'none';
        }, 2000); // Adjust the duration (in milliseconds) as needed
        // Delay closing the danger message
        setTimeout(function () {
            document.getElementById('dangerMessage').style.display = 'none';
        }, 2000); // Adjust the duration (in milliseconds) as needed
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <div class="container">
        <footer
            class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top fixed-bottom navbar-light bg-light">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <span class="mb-3 mb-md-0 text-muted">© 2022 Company, Inc</span>
            </div>
        </footer>
    </div>

</body>

</html>
