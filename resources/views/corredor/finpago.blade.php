@extends('layouts.layout')
{{-- Para escribir el contenido de la pagina, hay que hacer una section con mismo nombre del yield en el archivo layout.balde.php  --}}
@section('content')

<div id="contPaypal">
<div class="row rowpaypal">
  <div class="col-6 col-md-6" style="font-size:36px;padding-top:30px;">Paypal</div>
  <div class="col-6 col-md-6"><img style="width:200px;" src="../../resources/img/logo-Paypal.png"></div>
</div>

<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
<div class="row rowpaypal">
  <div class="col-12 col-md-12"><?php echo $msg ?></div>
</div>

<div class="row rowpaypal">
  <div class="col-6 col-md-6"><a class="btn btn-primary" href="{{url('/')}}" role="button">Volver</a></div>
  <div class="col-6 col-md-6"><a class="btn btn-primary" href="#" role="button">Descargar factura</a></div>

</div>
</div>
@endsection