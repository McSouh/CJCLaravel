@extends('layouts.home')

@section('content')


 <!-- about
    ================================================== -->
    
    <section id='about' class="s-about">

            <div class="container mt-4">
                    <div class="row section-header" data-aos="fade-up">
                            <div class="col-full">
                                <a href="/plumes" class="display-4">Retour</a>
                                <h3 class="subhead mt-3">Plume {{$plume->title}}</h3>
                            </div>
                        </div> <!-- end section-header -->
                
                        <div class="row w-100" data-aos="fade-up">
                                <div id="issuupreview" data-url="{{ $plume->url }}" style="width:100%; height:60vh;" class="issuuembed"></div>
                        </div> <!-- end about-desc -->
                
            </div>
    
        </section> <!-- end s-about -->


@endsection