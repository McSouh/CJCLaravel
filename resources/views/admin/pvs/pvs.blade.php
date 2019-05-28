@extends('layouts.app')

@section('content')

<a class="btn btn-dark text-light" href="/admin/pvs/create">Nouveau PV</a>

@foreach($pvs as $pv)

<div class="media bg-dark text-light py-1 pr-3 my-2 d-flex">
    <h5 class="my-auto"><a class="badge badge-pill bg-secondary text-light ml-3" href="{{$pv->file}}">PDF</a></h5>
    <a href="/admin/pvs/{{ $pv->id }}" class="text-light my-auto">
        <div class="media-body pl-3">
            <h4 class="my-0">{{ $pv->name }}</h4>
        </div>
    </a>
    <form action="/admin/pvs/{{ $pv->id }}" method="post" class="ml-auto">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>

@endforeach

@endsection