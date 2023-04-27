@extends('layouts.layout')
{{-- Para escribir el contenido de la pagina, hay que hacer una section con mismo nombre del yield en el archivo layout.balde.php  --}}
@section('content')
<script src="../../resources/views/scripts/script.js"></script>
<div class="container air">
<div class="container">
                <div class="row">
                    <div class="col-lg-12">
                            <h1 style="display:inline">{{$races['title']}}</h1>
                            <?php $id=$races['id'];?>
                            <!-- Esto para la ruta funciona (poner name en web.php) -->
                            <a href="{{route('inforace', [$id])}}" class="btn btn-primary float-right" style="margin-top: 10px;">Volver atrás</a>
                    </div>
                </div>
        </div>
        <hr>
  <form action="{{$races['id']}}" method="POST" accept-charset="UTF-8" class="formaddcarrera" enctype="multipart/form-data">
    @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" name="nombre" max-length="100" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Apellidos</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="surname" max-length="200" required>
        </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-2 col-form-label">Dirección</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="direction" max-length="200" required>
          </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-2 col-form-label">Fecha de nacimiento</label>
          <div class="col-lg-2">
            <input type="date" class="form-control" name="birth" required>
          </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-2 col-form-label">Sexo</label>
          <div class="col-sm-10">
            <input type="radio" name="sexo" value="masculino"  required/>Masculino
            <input type="radio" name="sexo" value ="femenino" required/>Femenino
          </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-2 col-form-label">Opción</label>
          <div class="col-sm-10">
            <input type="radio" name="option" id="pro" value="pro" onclick="show()" required/>Pro
            <input type="radio" name="option" id="open" value="open" onclick="hide()" required/>Open
          </div>
      </div>

      <div class="form-group row" style="display:none"  id="divOp">
          <label class="col-lg-12 col-form-label">Numero de federado</label>
          <div class="col-lg-12">
            <input type="text" class="form-control" id="fed" name="fed" minlength="4" maxlength="9">
          </div>
      </div>

      <div class="form-group row" style="display:none;"   id="divHd">
          <label class="col-lg-12 col-form-label">Escoge un seguro(el precio de la carrera está incluido)</label>
          <div class="col-lg-12">
            <select class="form-select form-select-md mb-2" name="aseguradora" id="aseguradora">
                  <?php
                  $c=0;
                  foreach($aseguradoras as $a){
                    ?>
                    <!-- Precio de la carrera + Aseguradora !! -->
                    <option value="<?php echo $a['name'];?>"><?php echo $a['name'].'-'.$ensures[$c]['price']+$races['price'].'€'?></option>
                  <?php

                  $c++;
                  }
                  ?>
            </select>
          </div>
      </div>

      <div class="form-group row" style="display:none;"  id="divH">
          <div class="col-sm-10">
                  <p> Precio final <?php echo $races['price']; ?>€ </p>
          </div>
      </div>
    

      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" name="inscription">Inscribirse</button>
        </div>
      </div>
  </form>
  <!-- <p><a href="{{url('/')}}">Volver atrás</a></p> -->
</div>
@endsection
