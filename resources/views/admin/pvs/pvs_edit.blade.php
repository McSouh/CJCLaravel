@extends('layouts.app')

@section('content')

<a class="btn btn-dark text-light" href="/admin/pvs/">Retour</a>

<div class="card mt-3">

        <h5 class="card-header bg-light text-center py-4 mt-0">
            <strong>Modifier PV</strong>
        </h5>

        <div class="card-body px-lg-5 ">

            <form action="/admin/pvs/{{ $pv->id }}" method="post" class="my-3" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="md-form my-3">
                    <input name="name" type="text" class="form-control" placeholder="Nom" value="{{ $pv->name }}">
                </div>

                <div class="md-form my-3 d-flex">
                    <div class="w-100 d-flex justify-content-center">
                        <input type="file" name="file" placeholder="{{ $pv->file }}" >
                    </div>
                </div>
   
                <button class="btn btn-info btn-rounded btn-block z-depth-0 my-4" type="submit">Sauver</button>
    
            </form>
    
        </div>
    
    </div>


@endsection