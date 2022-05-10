<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Vinix crud') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    
    @notifyCss
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark" style="margin-right: 0%;">
        <div class="container-fluid " style="margin-top: 2px; margin-bottom: 2px; margin-right: 0%;">
            <button style="border-color: white;" class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span>Vinix</span>
            </button>
        </div>
        <div class="collapse navbar-expand-lg navbar-collapse" id="navbarToggleExternalContent" style="width: 100vw; height: 10vh;margin-right: 0%;">
            <hr>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="{{ route('pets.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('pets.create') }}">Create Pet</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
    @notifyJs
    <x:notify-messages />
</body>
</html>