@extends('layouts.app')

@section('content')

<a class="btn btn-dark text-light" href="/admin/actualites/">Retour</a>

<div class="card mt-3">

        <h5 class="card-header bg-light text-center py-4 mt-0">
            <strong>Modifier Actualité</strong>
        </h5>

        <div class="card-body px-lg-5 ">

            <form action="/admin/actualites/{{ $article->id }}" method="post" class="my-3" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="md-form my-3">
                    <input name="title" type="text" class="form-control" placeholder="Titre" value="{{ $article->title }}">
                </div>

                <div class="md-form my-3">
                    <textarea name="description" type="text" class="form-control" placeholder="Description">{{ $article->description }}</textarea>
                </div>

                <div class="md-form my-3 d-flex">
                    <div class="w-100">
                        <label class="form-control text-left" for="uploadImage">Image : <span id="uploadLabel">{{ $article->image }}</span></label>
                        <input id="uploadImage" class="d-none" type="file" name="image" onchange="PreviewImage();" >
                    </div>
                </div>

                <div class="md-form my-3 d-flex text-center">
                    <div class="w-100">
                        <img src="{{ $article->image }}" id="uploadPreview" style="height: 100px" />
                    </div>
                </div>
   
                <button class="btn btn-info btn-rounded btn-block z-depth-0 my-4" type="submit">Sauver</button>
    
            </form>
    
        </div>
    
    </div>

    <script type="text/javascript">

        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
    
            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
                document.getElementById("uploadLabel").innerText = (document.getElementById("uploadImage").files[0]).name;

            };
        };
    
    </script>

@endsection