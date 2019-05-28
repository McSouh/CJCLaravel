@extends('layouts.app')

@section('content')

<a class="btn btn-dark text-light" href="/admin/galeries/create">Nouvelle Galerie</a>

@foreach($galeries as $comite)

<div class="media bg-dark text-light py-2 pr-3 my-2">
    <a href="/admin/galeries/{{ $comite->id }}" class="text-light">
        <div class="media-body pl-3">
                <h4 class="mt-0">{{ $comite->title }}</h4>
        </div>
    </a>
    <form action="/admin/galeries/{{ $comite->id }}" method="post" class="ml-auto">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>

@endforeach

@endsection