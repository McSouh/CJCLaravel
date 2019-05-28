@extends('layouts.app')

@section('content')

<a class="btn btn-dark text-light" href="/admin/comites/">Retour</a>

<div class="card mt-3">

        <h5 class="card-header bg-light text-center py-4 mt-0">
            <strong>Nouveau Comité</strong>
        </h5>

        <div class="card-body px-lg-5 ">

            <form action="/admin/comites" method="post" class="my-3">
                @csrf
                <div class="md-form my-3">
                    <input name="year" type="text" class="form-control" placeholder="Mandat (ex: 2016 - 2017)" value="{{ old('year') }}">
                </div>
    
                <button class="btn btn-info btn-rounded btn-block z-depth-0 my-4" type="submit">Créer</button>
    
            </form>
    
        </div>
    
    </div>

@endsection