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
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<div class="container air">
<form action="editarCarrera" method="post">
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
                <h1 style="display:inline">Todas las carreras</h1>
                <a href="{{url('/paginaPrincipal')}}" class="btn btn-primary float-right" style="margin-top: 10px;">Volver a la página principal</a>
            </div>
        </div>
    </div>
    <hr>

    <?php if ($carreras->count()==0){
        echo '<p> Actualmente no hay carreras que mostrar </p>';
    }
    else{ ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($carreras as $row)
                @php
                    $id = $row['id'];
                @endphp
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title">{{$row['title']}}</h5>
                    </div>
                    <div class="card-body">
                        <?php $prom=preg_replace('([^A-Za-z0-9 ])', '', $row['promotion'])?>
                        <p class="card-text" style="max-height:300px;text-align:center"><a href="cartelCarrera/{{$id}}"><img src="../resources/img/<?php echo strtolower($prom) ?>.jpg" alt="" style="margin:0 auto;"></a>
                        <!-- <p class="card-text"><strong>Descripción: </strong>{{$row['description']}}</p> -->
                        <p class="card-text"><strong>Fecha: </strong> {{$row['date']}}</p>
                        <p class="card-text"><strong>Salida: </strong> {{$row['start']}} </p>
                        <p class="card-text"><strong>Nº de participantes: </strong> {{$row['number_participants']}} </p>
                        <p class="card-text"><strong>Distancia y desnivel:</strong> {{$row['km']}}km / {{$row['unevenness']}}m </p>
                        
                       
                        <p class="card-text"><strong>Precio: </strong> {{$row['price']}}€</p>


                        <p class="card-text"><a href="runnersRace/{{$id}}"><img src="../resources/img/edit.png" alt="" style="width:20px;height:20px;"></a><strong> Corredores apuntados </strong> </p>
                        <p class="card-text"><a href="aseguradoraC/{{$id}}"><img src="../resources/img/edit.png" alt="" style="width:20px;height:20px;"></a> <strong>Gestionar aseguradoras </strong></p>

                        <?php 
                        //Si la carrera ya ha terminado permitir subir fotos
                        if (date($row['date'])<date('Y-m-d H:i:s')){   
                            ?><p class="card-text"><a href="subirFotos/{{$id}}"><img src="../resources/img/upload.png" alt="" style="width:20px;height:20px;"></a><strong> Subir fotos</strong> </p><?php
                        }
                        else{
                            ?><p><img src="../resources/img/bloquear.png" alt="" style="width:20px;height:20px;"><strong> Subir fotos</strong> </p><?php
                        }
                        ?>

                        
                        <p class="card-text"><a href="verFotos/{{$id}}"><img src="../resources/img/ver.png" alt="" style="width:20px;height:20px;"></a><strong> Ver fotos</strong></p>

                        <p class="card-text">
                            @if ($row['state'] == 0)
                                <a href="estadoCarrera/{{$id}}"><img src="../resources/img/off.png" alt="" style="width:30px;height:30px;"></a>
                            @else
                                <a href="estadoCarrera/{{$id}}"><img src="../resources/img/on.png" alt="" style="width:30px;height:30px;"></a>
                            @endif
                            <strong>Estado</strong>
                        </p>

                        <p class="card-text"><?php echo $row['image']?></p>
                        
                        
                        {{-- <i class="bi bi-toggle-on"></i> --}}
                    </div>
                    <div class="card-footer">
                        <a href="datosCarrera/{{$id}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar</a>
                        <a href="imagenCarrera/{{$id}}" class="btn btn-primary float-right"><i class="bi bi-pencil-square"></i> Actualizar mapa</a>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    <?php }?>
   
<!-- <a href="{{url('/paginaPrincipal')}}">Volver atras</a> -->

@endsection