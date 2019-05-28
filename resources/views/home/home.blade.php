@extends('layouts.home')

@section('content')


<!-- home
    ================================================== -->
    <div style="max-height: 100vh; overflow: hidden">
            <section id="home" class="s-home target-section py-0 my-0" data-parallax="scroll" data-image-src="/image/CJCBGBANNER.jpg"  data-position-y=top style="max-height: 100vh !important; height: 100vh !important; min-height: 50vh !important">

                <div class="shadow-overlay"></div>
        
                <div class="container">
                    <div class="home-content ml-0">
        
                        <div class="row home-content__main">
                            <h1 class="pl-md-5 h3">
                            Cercle de Journalisme
                            et Communication
                            </h1>
            
                            <p>
                            Cercle des étudiants en
                            Journalisme et Communication de l'ULB.
                            </p>
                        </div> <!-- end home-content__main -->
            
                    </div> <!-- end home-content -->
                </div>
        
                <ul class="home-social">
                    <li class="home-social-title">Suivez-nous</li>
                    <li><a target="_blank" href="https://www.facebook.com/cjculb">
                        <i class="fab fa-facebook"></i>
                        <span class="home-social-text">Facebook</span>
                    </a></li>
                    <li><a target="_blank" href="https://twitter.com/CJCULB">
                        <i class="fab fa-twitter"></i>
                        <span class="home-social-text">Twitter</span>
                    </a></li>
                    <li><a target="_blank" href="https://www.instagram.com/cjc_ulb/">
                        <i class="fab fa-instagram"></i>
                        <span class="home-social-text">Instagram</span>
                    </a></li>
                </ul> <!-- end home-social -->
        
                <a href="/cercle" class="home-scroll">
                    <span class="home-scroll__text">Á PROPOS DE NOUS</span>
                    <span class="home-scroll__icon" style="transform: rotate(-90deg)">
                    </span>
                </a> <!-- end home-scroll -->
        
            </section> <!-- end s-home -->
    </div>


@endsection