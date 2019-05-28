@extends('layouts.home')

@section('content')


 <!-- about
    ================================================== -->
    
    <section id='about' class="s-about">

            <div class="container mt-4">
                    <div class="row section-header" data-aos="fade-up">
                            <div class="col-full">
                                <a href="/photos" class="display-4">Retour</a>
                                <h3 class="subhead mt-3">Galerie {{$galery->title}}</h3>
                            </div>
                        </div> <!-- end section-header -->
                
                        <div class="row w-100" data-aos="fade-up">
                            @foreach($photos as $photo)
                                <img class="border border-success m-2" style="height: 200px; width: 200px;background-image: url({{$photo->image}}); background-size: cover; background-position: center;">
                            @endforeach
                        </div> <!-- end about-desc -->
                        <div class="d-flex justify-content-center">
                                <div class="mt-5">
                                        {{$photos->links()}}
                                </div>
                        </div>
                
            </div>
    
        </section> <!-- end s-about -->


@endsection