@extends('layouts.layout')
{{-- Para escribir el contenido de la pagina, hay que hacer una section con mismo nombre del yield en el archivo layout.balde.php  --}}
@section('content')

<div class="container air">


<div class="container">
                <div class="row">
                    <div class="col-lg-12">
                            <h1 style="display:inline">Inscripción</h1>
                    </div>
                </div>
        </div>
        <hr>


<form action="{{ route('ins') }} " method="POST" accept-charset="UTF-8" class="formaddcarrera" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
        <label class="col-lg-11">Para continuar con el proceso de inscripción y pago, el equipo de Bikerroll debe asegurarse de que usted está de acuerdo con los términos y condiciones.</label>
        <div class="col-lg-12">
        <input type="radio" name="option" value="si" id="accept" required/>Si, acepto los términos y condiciones y quiero proseguir con el pago<br>
        <input type="radio" name="option" value="no" id="denied" required/>No, he cambiado de opinión y no quiero inscribirme
        </div>
    </div>


    {{-- Pasar parametros --}}
    <div style="display:none">
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="number" name="runner" value="<?php echo $runner ?>" required/>
                <input type="number" name="id" value="<?php echo $race ?>" required/>
                <input type="number" name="aseguradora" value="<?php echo $insurance ?>" required/>
                <input type="number" name="pro" value="<?php echo $pro ?>" required/>
            </div>
          </div>
    </div>

    <div class="form-group row">
      <div class="col-lg-10">
        <button class="btn btn-primary" type="submit" name="pagar" id="Change">Ir a PayPal</button>
      </div>
    </div>
    <p></p>
  
</form>

<!-- <form action="facturaCorredor" method="post">
  <input type="submit" value="Descargar factura">
  <input type="hidden" name="id_runner" value="{{$runner}}">
</form> -->
{{-- <!-- <a href="{{route('facturaCorredor' , $runner)}}">Descargar factura</a>   --> --}}

<!-- {{-- <p><a href="{{url('/')}}">Volver atrás</a></p> --}} -->
<div>



<!-- Meter Jquery para cambiar texto del botón -->
<script>
$(document).ready(function(){  
  $("#accept").click(function() {  
     $("#Change").html("Ir a PayPal");
  }); 
  $("#denied").click(function() {  
     $("#Change").html("Volver");
  }); 
});   
</script>

<a href="facturaCorredor/{{$runner}}/{{$race}}">Descargar factura</a>
@endsection