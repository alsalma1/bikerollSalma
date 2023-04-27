@extends('layouts.layout')
{{-- Para escribir el contenido de la pagina, hay que hacer una section con mismo nombre del yield en el archivo layout.balde.php  --}}
@section('content')
<style>
    td,th{border: 1px solid;}
    td{width: 80px}
    table{width: 1200px;margin: auto;text-align: center;}
    img{width: 50%;height: 50%}
</style>
<div class="container air">
<div class="container">
                <div class="row">
                    <div class="col-lg-12">
                            <h1 style="display:inline">Editar Mapa</h1>
                            <a href="{{url('/editarCarrera')}}" class="btn btn-primary float-right" style="margin-top: 10px;">Volver atrás</a>
                    </div>
                </div>
        </div>
        <hr>
<form action="{{$carreras['id']}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="mapa" class="col-sm-2 col-form-label">Link del mapa</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="mapa" name="image" required>
        </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary" name="send">Editar imagen</button>
      </div>
    </div>
</form>   
</div>
<!-- <a href="{{url('/paginaPrincipal')}}">Volver atras</a> -->
@endsection