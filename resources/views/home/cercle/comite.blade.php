@extends('layouts.home')

@section('content')


 <!-- about
    ================================================== -->

    @include('home.cercle.navigation')
    
    <section id='about' class="s-about">

            <div class="container">
                    <div class="row section-header" data-aos="fade-up">
                            <div class="col-full">
                                    <div style="height: 30px; !important;" class="dropdown show mb-3">
                                            <a style="height: 30px; !important" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Années
                                            </a>
                                          
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                              @foreach($comites as $onecomite)
                                                <a class="dropdown-item h3 my-0" href="/comites/{{$onecomite->id}}">{{$onecomite->year}}</a>
                                              @endforeach
                                            </div>
                                          </div>
                                <h3 class="subhead">Délégué.e.s {{$comite->year}}</h3>
                            </div>
                            @foreach($comite->delegues as $delegue)
                            <div class="col-md-3 col-6">
                                <img style="height: 150px; width: 150px; background-image: url({{$delegue->image}}); background-size: cover; background-position: center" alt="">
                                <h3>{{$delegue->name}}</h3>
                                <p>{{$delegue->poste}}</p>
                            </div>
                            @endforeach
                        </div> <!-- end section-header -->
                
            </div>
    
        </section> <!-- end s-about -->


@endsection