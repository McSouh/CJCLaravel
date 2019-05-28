@extends('layouts.home')

@section('content')


 <!-- about
    ================================================== -->
    
    <section id='about' class="s-about">

            <div class="container mt-4">
                    <div class="row section-header" data-aos="fade-up">
                            <div class="col-full">
                                <h3 class="subhead">Plumes</h3>
                            </div>
                        </div> <!-- end section-header -->
                
                        <div class="row" data-aos="fade-up">
                            @foreach($plumes as $plume)
                                <a href="/plumes/{{$plume->id}}" >
                                    <span class="h3">{{$plume->year}} - {{$plume->title}}</span>
                                </a>
                            @endforeach
                        </div> <!-- end about-desc -->
                
            </div>
    
        </section> <!-- end s-about -->


@endsection