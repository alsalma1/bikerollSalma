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
                            <h1 style="display:inline">Editar Carrera {{$carreras['title']}}</h1>
                            <a href="{{url('/editarCarrera')}}" class="btn btn-primary float-right" style="margin-top: 10px;">Volver atrás</a>
                    </div>
                </div>
        </div>
        <hr>
<form action="{{$carreras['id']}}" method="POST">
    @csrf
    <div class="form-group row">
      <label for="description" class="col-sm-2 col-form-label">Título</label>
      <div class="col-sm-10">
        <textarea id="title"  class="form-control" name="title" required>{{$carreras['title']}}</textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="description" class="col-sm-2 col-form-label">Descripción</label>
      <div class="col-sm-10">
        <textarea id="description" class="form-control"  name="description" required>{{$carreras['description']}}</textarea>
      </div>
    </div>

    <div class="form-group row">
        <label for="desnivel" class="col-sm-2 col-form-label">Desnivel</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="desnivel" name="unevenness" max="99" value="{{$carreras['unevenness']}}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="participantes" class="col-sm-2 col-form-label">Participantes màximos</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="participantes" name="number_participants" max="999" value="{{$carreras['number_participants']}}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="km" class="col-sm-2 col-form-label">Kilómetros</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="km" name="km" max="100" value="{{$carreras['km']}}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
        <div class="col-sm-10">
          <input type="datetime-local" class="form-control" id="fecha" name="date" value="{{$carreras['date']}}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="salida" class="col-sm-2 col-form-label">Punto de salida</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="salida" name="start" maxlength="255" value="{{$carreras['start']}}" required>
        </div>
    </div>


    <div class="form-group row">
        <label for="coste" class="col-sm-2 col-form-label">Coste depatrocinio</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="coste" name="price"  value="{{$carreras['price']}}" max="99" required>
        </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary" name="send">Editar carrera</button>
      </div>
    </div>
</form>   
</div>
<!-- <a href="{{url('/paginaPrincipal')}}">Volver atras</a> -->
@endsection