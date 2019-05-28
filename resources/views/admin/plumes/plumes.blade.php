@extends('layouts.app')

@section('content')

<a class="btn btn-dark text-light" href="/admin/plumes/create">Nouvelle Plume</a>

@foreach($plumes as $plume)

<div class="media bg-dark text-light py-2 pr-3 my-2 d-flex">
    <a href="/admin/plumes/{{ $plume->id }}" class="text-light">
        <div class="media-body pl-3 my-auto">
            <p class="my-0">{{ $plume->year }}</p>
            <h5 class="my-0">{{ $plume->title }}</h5>
        </div>
    </a>
    <form action="/admin/plumes/{{ $plume->id }}" method="post" class="ml-auto">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>

@endforeach

@endsection