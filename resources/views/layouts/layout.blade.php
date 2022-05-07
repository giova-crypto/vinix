<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Vinix crud') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid " style="margin-top: 2px; margin-bottom: 2px;">
            <button style="border-color: white;" class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span>Vinix</span>
            </button>
        </div>
        <div class="collapse navbar-expand-lg navbar-collapse" id="navbarToggleExternalContent" style="width: 100vw; height: 10vh;">
            <hr>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Create Pet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Search Pet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Update Pet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Delete Pet</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
</body>
</html>