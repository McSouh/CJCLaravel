@extends('layouts.app')

@section('content')

<a class="btn btn-dark text-light" href="/admin/galeries/">Retour</a>

<div class="card mt-3">

        <h5 class="card-header bg-light text-center py-4 mt-0">
            <strong>Nouvelle Galerie</strong>
        </h5>

        <div class="card-body px-lg-5 ">

            <form action="/admin/galeries" method="post" class="my-3">
                @csrf
                <div class="md-form my-3">
                    <input name="title" type="text" class="form-control" placeholder="Titre" value="{{ old('title') }}">
                </div>
    
                <button class="btn btn-info btn-rounded btn-block z-depth-0 my-4" type="submit">Créer</button>
    
            </form>
    
        </div>
    
    </div>

@endsection