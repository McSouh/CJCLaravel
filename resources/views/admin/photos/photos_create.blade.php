@extends('layouts.app')

@section('content')

<a class="btn btn-dark text-light" href="/admin/galeries/{{$galery->id}}">Retour</a>

<div class="card mt-3">

        <h5 class="card-header bg-light text-center py-4 mt-0">
            <strong>Ajouter Photos - {{$galery->title}}</strong>
        </h5>

        <div class="card-body px-lg-5 ">

            <form action="/admin/galeries/{{$galery->id}}/photos" method="post" class="my-3" enctype="multipart/form-data">
                @csrf

                <div class="md-form my-3">
                    <input name="image[]" type="file" multiple class="form-control" placeholder="Images">
                </div>

                <div class="md-form my-3 d-flex text-center">
                    <div class="w-100">
                        <img id="uploadPreview" style="height: 100px" />
                    </div>
                </div>
    
                <button onclick="document.querySelector('#preloader').classList.remove('d-none')" class="btn btn-info btn-rounded btn-block z-depth-0 my-4" type="submit">Créer</button>
    
            </form>
    
        </div>
    
    </div>

    <div id="preloader" class="d-none">
            <div id="loader">            
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

    <style>
    
/* ===================================================================
 * # preloader
 *
 * ------------------------------------------------------------------- */
#preloader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: #050505;
  z-index: 800;
  height: 100%;
  width: 100%;
}

#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  width: 60px;
  height: 60px;
  margin: -30px 0 0 -30px;
  padding: 0;
}

#loader:before {
  content: "";
  border-top: 6px solid rgba(255, 255, 255, 0.1);
  border-right: 6px solid rgba(255, 255, 255, 0.1);
  border-bottom: 6px solid rgba(255, 255, 255, 0.1);
  border-left: 6px solid #52a83e;
  -webkit-animation: load 1.1s infinite linear;
  animation: load 1.1s infinite linear;
  display: block;
  border-radius: 50%;
  width: 60px;
  height: 60px;
}

@-webkit-keyframes load {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes load {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>

@endsection