@extends('layouts.app')

@section('content')

<a class="btn btn-dark text-light" href="/admin/plumes/">Retour</a>

<div class="card mt-3">

        <h5 class="card-header bg-light text-center py-4 mt-0">
            <strong>Nouvelle Plume</strong>
        </h5>

        <div class="card-body px-lg-5 ">

            <form id="form" action="/admin/plumes" method="post" class="my-3">
                @csrf
                <div class="md-form my-3">
                    <input name="year" type="text" class="form-control" placeholder="Mandat (ex: 2016 - 2017)" value="{{ old('year') }}">
                </div>
                
                <div class="md-form my-3">
                    <input name="title" type="text" class="form-control" placeholder="Titre" value="{{ old('title') }}">
                </div>

                <div class="md-form my-3">
                    <input id="urlinput" oninput="PreviewIssuu();" name="url" type="text" class="form-control" placeholder="Lien Issuu (ex: https://issuu.com/cjc_ulb/docs/laplume_novembre-18)" value="{{ old('url') }}">
                </div>

                
                <div id="issuupreview" data-url="{{ old('url') }}" style="width:100%; height:200px;" class="issuuembed"></div>
                    
                <input id="validation" name="validation" type="hidden" value="ok"/>
    
                <button class="btn btn-info btn-rounded btn-block z-depth-0 my-4" type="submit">Créer</button>
    
            </form>
    
        </div>
    
    </div>

        <script type="text/javascript">
            function PreviewIssuu() {
                document.querySelector('#validation').value = "";
                document.querySelector('#form').submit();
            };
        </script>

@endsection