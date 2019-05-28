@extends('layouts.app')

@section('content')

<a class="btn btn-dark text-light" href="/admin/galeries/">Retour</a>

<div class="card my-3">

        <h5 class="card-header bg-light text-center py-4 mt-0">
            <strong>Modifier Galerie</strong>
        </h5>

        <div class="card-body px-lg-5 ">

            <form action="/admin/galeries/{{ $galery->id }}" method="post" class="my-3" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="md-form my-3">
                    <input name="title" type="text" class="form-control" placeholder="Titre" value="{{ $galery->title }}">
                </div>
   
                <button class="btn btn-info btn-rounded btn-block z-depth-0 my-4" type="submit">Sauver</button>
    
            </form>
    
        </div>
    
    </div>

    <a class="btn btn-dark text-light" href="/admin/galeries/{{$galery->id}}/photos/create">Ajouter Photos</a>

    
    <div class="d-flex flex-wrap mt-2">
        @foreach($galery->images as $image)
        <div class="position-relative">
            <form action="/admin/photos/{{ $image->id }}" method="post" class="ml-auto">
                @method('delete')
                @csrf
                <button style="right: 0px;" class="position-absolute bg-danger text-light">X</button>
            </form>
            <img style="height: 100px; width:100px; background-image: url({{ $image->image }}); background-size: cover; background-position: center" class="m-2" alt="">
        </div>
        @endforeach
    </div>
            


@endsection