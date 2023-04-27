{{-- @extends('layouts.layout')

@section('content')
    <h1>Carreras que patroniza el sponsor {{$id}}</h1>

    @foreach ($races as $race)
        <?php //$imagen=preg_replace('([^A-Za-z0-9 ])', '', $race->promotion); ?>
        <img  src="	http://localhost/bikerollSalma/resources/img/<?php //echo strtolower($imagen) ?>.jpg" alt="Card image cap">

        <p>{{$race->title}}</p>
    @endforeach
@endsection --}}

@extends('layouts.layout')
{{-- Para escribir el contenido de la pagina, hay que hacer una section con mismo nombre del yield en el archivo layout.balde.php  --}}
@section('content')
<style>
    td,th{border: 1px solid;}
    td{width: 80px}
    table{width: 1500px;margin: auto;text-align: center;}
    img{width: 50%;height: 50%}
    iframe{max-width:400px !important;max-height:200px;width:100% !important;}

</style>
<?php
    $id_sponsor = $id;
?>
<div class="container air">
    <form action="../carreras-sponsor/{{$id}}" method="post">
        @csrf
        <div class="input-group col-lg-12" style="margin:20px 0 20px;">
            <input type="text" name="buscador" class="form-control col-lg-12" placeholder="Búsqueda..." aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <input type="submit" value="Buscar" name="buscButton" class="btn btn-outline-secondary" type="button">
            </div>
        </div>
    </form>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="display:inline">Carreras del sponsor {{$id_sponsor}}</h1>
                <a href="{{url('mostrarSponsors')}}" class="btn btn-primary float-right mr-3" style="margin: 10px 0 0 20px;">Sponsors</a>
                <a href="{{url('/paginaPrincipal')}}" class="btn btn-primary float-right" style="margin-top: 10px;">Página principal</a>
            </div>
        </div>
    </div>
    <hr>

    <?php if ($races->count()==0){
        echo '<p> Actualmente no hay carreras que mostrar </p>';
    }
    else{ ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($races as $race)
                @php
                    $id_race = $race->id;
                @endphp
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title">{{$race->title}}</h5>
                        </div>
                        <div class="card-body">
                            <?php $prom=preg_replace('([^A-Za-z0-9 ])', '', $race->promotion)?>
                            <p class="card-text" style="max-height:300px;text-align:center"><img src="../../resources/img/<?php echo strtolower($prom) ?>.jpg" alt="" style="margin:0 auto;"></p>
                            <p class="card-text"><strong>Fecha: </strong> {{$race->date}}</p>
                            <p class="card-text"><strong>Precio: </strong> {{$race->price}}€</p>
                            <p class="card-text"><?php echo $race->image?></p>

                        </div>
                        <div class="card-footer">
                            <a href="../eliminarCarrera/{{$id_race}}/{{$id_sponsor}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Eliminar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    <?php }?>

@endsection
