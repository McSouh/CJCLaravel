<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script id="scriptissuu" type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script>
    <link rel="icon" href="/image/CJCLOGO.png" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
                <div style="height: 100vh;" class="position-fixed col-4 col-sm-2 bg-dark text-light d-flex flex-column">
                    <a href="/" class="my-4 text-light d-flex justify-content-center">
                        <img style="height: 100px;" src="/image/CJCLOGO.png" alt="">
                    </a>
                    @auth
                    <a href="/admin" class="w-100 my-1 btn btn-info {{ request()->is('*admin') ? 'active' : '' }}">Infos</a>
                    <hr class="bg-light my-4 w-100">
                    <a href="/admin/actualites" class="w-100 my-1 btn btn-light {{ request()->is('*admin/actualites*') ? 'active' : '' }}">Actualités</a>
                    <a href="/admin/pvs" class="w-100 my-1 btn btn-light {{ request()->is('*admin/pvs*') ? 'active' : '' }}">PV's</a>
                    <a href="/admin/statuts" class="w-100 my-1 btn btn-light {{ request()->is('*admin/statuts*') ? 'active' : '' }}">Statuts</a>
                    <a href="/admin/comites" class="w-100 my-1 btn btn-light {{ request()->is('*admin/comites*') ? 'active' : '' }}">Comités</a>
                    <a href="/admin/galeries" class="w-100 my-1 btn btn-light {{ request()->is('*admin/galeries*') ? 'active' : '' }}">Photos</a>
                    <a href="/admin/plumes" class="w-100 my-1 btn btn-light {{ request()->is('*admin/plumes*') ? 'active' : '' }}">Plumes</a>
                    <a href="/logout" class="w-100 mt-auto mb-4 btn btn-danger">Se déconnecter</a>
                    @endauth

                </div>
                <div class="offset-sm-2 col-sm-10 offset-4 col-8 bg-light p-3">
                    @yield('content')
                    @include('errors')
                    @include('success')
                </div>

        </div>
    </div>
</body>
</html>
