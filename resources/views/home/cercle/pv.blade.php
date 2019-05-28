@extends('layouts.home')

@section('content')


 <!-- about
    ================================================== -->

    @include('home.cercle.navigation')
    
    <section id='about' class="s-about">

            <div class="container">
                    <div class="row section-header" data-aos="fade-up">
                            <div class="col-full">
                                <h3 class="subhead">PV's</h3>
                            </div>
                        </div> <!-- end section-header -->
                
                        <div class="row" data-aos="fade-up">
                            <div class="col-full">
                                    @foreach($pvs as $pv)
                                        <a class="h3 my-3 d-block" href="{{$pv->file}}">{{$pv->name}}</a>
                                    @endforeach
                            </div>
                        </div> <!-- end about-desc -->
                
            </div>
    
        </section> <!-- end s-about -->


@endsection