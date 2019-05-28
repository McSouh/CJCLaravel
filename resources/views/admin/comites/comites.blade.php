@extends('layouts.app')

@section('content')

<a class="btn btn-dark text-light" href="/admin/comites/create">Nouveau Comité</a>

@foreach($comites as $comite)

<div class="media bg-dark text-light py-2 pr-3 my-2">
    <a href="/admin/comites/{{ $comite->id }}" class="text-light">
        <div class="media-body pl-3">
                <h4 class="mt-0">{{ $comite->year }}</h4>
        </div>
    </a>
    <form action="/admin/comites/{{ $comite->id }}" method="post" class="ml-auto">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>

@endforeach

@endsection