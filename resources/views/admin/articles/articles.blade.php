@extends('layouts.app')

@section('content')

<a class="btn btn-dark text-light" href="/admin/actualites/create">Nouvelle Actualité</a>

@foreach($articles as $article)

<div class="media bg-dark text-light py-3 pr-3 my-2">
    <div style="min-width: 80px;" class="d-flex justify-content-center">
        <img style="height: 50px; width:50px; background-image: url({{ $article->image }}); background-size: cover; background-position: center"  alt="">
    </div>
    <a href="/admin/actualites/{{ $article->id }}" class="text-light">
        <div class="media-body">
                <h5 class="mt-0">{{ $article->title }}</h5>
                {{ $article->description }}
        </div>
    </a>
    <form action="/admin/actualites/{{ $article->id }}" method="post" class="ml-auto">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>

@endforeach

@endsection