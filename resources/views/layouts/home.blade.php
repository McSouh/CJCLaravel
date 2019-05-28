<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="/image/CJCLOGO.png" />

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/vendor.css">
    <link rel="stylesheet" href="/css/main.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script>

    <!-- script
    ================================================== -->
    <script src="/js/modernizr.js"></script>
    <script src="/js/pace.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="top">

        <header class="s-header" style="background-color: rgba(0, 100, 0, 0.3)">

                <div class="header-logo">
                    <a href="/" class="h-100 d-flex align-items-end mr-5">
                        <img src="/image/CJCLOGO.png" style="height: 70px; width: auto;" alt="Homepage">
                    </a>
                </div> <!-- end header-logo -->
        
                <nav class="header-nav" style="z-index: 1000">
        
                    <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>
        
                    <div class="header-nav__content">
                        <h3>Cercle de <br>
                            Journalisme et <br>
                            Communication</h3>
                        
                        <ul class="header-nav__list">
                            <li class="current"><a href="/">Accueil</a></li>
                            <li><a href="/cercle">Le Cercle</a></li>
                            <li><a href="/actualites">Actualités</a></li>
                            <li><a href="/photos">Photos</a></li>
                            <li><a href="/plumes">La Plume</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                
                        <ul class="header-nav__social">
                            <li>
                                <a target="_blank" href="https://www.facebook.com/cjculb"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li>
                                <a target="_blank" href="https://twitter.com/CJCULB"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a target="_blank" href="https://www.instagram.com/cjc_ulb/"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
        
                    </div> <!-- end header-nav__content -->
        
                </nav> <!-- end header-nav -->
        
                <a class="header-menu-toggle p-3 position-absolute" style="z-index: 99" href="#0">
                    <span class="header-menu-icon"></span>
                </a>
        
            </header> <!-- end s-header -->
        
    
        <main>
            @yield('content')
        </main>


    <!-- preloader
    ================================================== -->
    <div id="preloader">
            <div id="loader">            
            </div>
        </div>


    <!-- Java Script
    ================================================== -->
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
