@extends('layouts.home')

@section('content')


 <!-- about
    ================================================== -->
    
    <section id='about' class="s-about">

            <div class="container mt-4">
                    <div class="row section-header" data-aos="fade-up">
                            <div class="col-full">
                                <h3 class="subhead">Galeries</h3>
                                <p class="h3">Une petite sélection de photos prises durant nos événements en 2016-2017 <br>
                                Retrouvez l’entièreté des albums sur notre <a href="https://www.facebook.com/cjculb">page Facebook</a> ! </p>
                            </div>
                        </div> <!-- end section-header -->
                
                        <div class="row" data-aos="fade-up">
                            @foreach($galeries as $galery)
                                @if(count($galery->images))
                                <a href="/photos/{{$galery->id}}" class="col-6 col-md-3 h1 border border-success m-3" style="height: 200px;background-image: url({{$galery->images->random()->image}}); background-size: cover; background-position: center;">
                                    <span class="badge badge-pill bg-success text-light mt-3">{{$galery->title}}</span>
                                </a>
                                @endif
                            @endforeach
                        </div> <!-- end about-desc -->
                
            </div>
    
        </section> <!-- end s-about -->


@endsection