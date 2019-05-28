@extends('layouts.home')

@section('content')


 <!-- about
    ================================================== -->

    <section id='about' class="s-about">

            <div class="container">
                    <div class="row section-header" data-aos="fade-up">
                            <div class="col-full">
                                <h3 class="subhead">Actualités</h3>
                            </div>
                        </div> <!-- end section-header -->
                
                        <div class="row" data-aos="fade-up">
                            <div class="col-full">
                                @foreach($actualites as $actualite)
                                    <div style="background-color: rgba(0, 100, 0, 0.3)" class="border border-success my-5">
                                        <img style="height: 150px; width: 100%; background-image: url({{$actualite->image}}); background-size: cover; background-position: center" alt="">
                                        <div class="p-3">
                                            <h1 class="d-flex mb-4">{{$actualite->title}} <span class="ml-auto text-right text-muted text-monospace col-3" style="font-size: .7em">{{$actualite->created_at->diffForHumans()}}</span></h1>
                                            <p class="lead">
                                                {{$actualite->description}}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                                {{$actualites->links()}}
                            </div>
                        </div> <!-- end about-desc -->
                
            </div>
    
        </section> <!-- end s-about -->


@endsection