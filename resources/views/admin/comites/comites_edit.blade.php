@extends('layouts.app')

@section('content')

<a class="btn btn-dark text-light" href="/admin/comites/">Retour</a>

<div class="card my-3">

        <h5 class="card-header bg-light text-center py-4 mt-0">
            <strong>Modifier Comité</strong>
        </h5>

        <div class="card-body px-lg-5 ">

            <form action="/admin/comites/{{ $comite->id }}" method="post" class="my-3" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="md-form my-3">
                    <input name="year" type="text" class="form-control" placeholder="Mandat (ex: 2016 - 2017)" value="{{ $comite->year }}">
                </div>
   
                <button class="btn btn-info btn-rounded btn-block z-depth-0 my-4" type="submit">Sauver</button>
    
            </form>
    
        </div>
    
    </div>

    <a class="btn btn-dark text-light" href="/admin/comites/{{$comite->id}}/delegues/create">Nouveau.elle Délégué.e</a>

    @foreach($comite->delegues as $delegue)

    <div class="media bg-dark text-light py-3 pr-3 my-2">
            <div style="min-width: 80px;" class="d-flex justify-content-center">
                <img style="height: 50px; width:50px; background-image: url({{ $delegue->image }}); background-size: cover; background-position: center"  alt="">
            </div>
            <a href="/admin/delegues/{{ $delegue->id }}" class="text-light">
                <div class="media-body">
                        <h5 class="mt-0">{{ $delegue->name }}</h5>
                        {{ $delegue->poste }}
                </div>
            </a>
            <form action="/admin/delegues/{{ $delegue->id }}" method="post" class="ml-auto">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    @endforeach


@endsection