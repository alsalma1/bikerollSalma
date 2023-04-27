@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 160px;">
  <h1 style="margin-bottom: 40px;">Elegir Carreras disponibles</h1>
  @if (count($races) == 0)
    <p>Ya has seleccionado todas las carreras!</p>
  @else
    <form action="../chooseRaces/{{$id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @foreach ($races as $race)
            <?php 
                $id = $race['id'];
                $imagen = preg_replace('([^A-Za-z0-9 ])', '', $race['promotion']);
            ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                <img class="card-img-top" src="http://localhost/bikerollSalma/resources/img/<?php echo strtolower($imagen) ?>.jpg" alt="Card image cap" style="height: 200px;">
                <div class="card-body">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="racescheck[]" value="{{$id}}">
                    <label class="form-check-label"><h5 class="card-title">{{$race['title']}}</h5></label>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </div>
        <input type="submit" name="select" value="Seleccionar" class="btn btn-primary mt-3">
    </form>
  @endif
  <a href="{{url('/paginaPrincipal')}}" class="btn btn-secondary mt-3">Pagina principal</a>
</div>
@endsection
