@extends('layouts.layout')
@section('content')
    <?php
        $id = $races['id'];
        $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
        $newDate = strtotime($races['date']); 
    ?>
<div class="container air">
        <div class="container air">
            <div class="row">
                <div class="col-lg-12">
                <h1 style="display:inline">{{$races['title']}}</h1>
                    @if($newDate<$fecha_actual)
                        <a href="../clasificaciones/{{$id}}" class="btn btn-primary float-right" style="margin-top: 10px;">Clasificaciones</a>
                    @endif
                </div>
            </div>
        </div>
                    <hr>

    <div class="row" id="containerinfo" >
        {{-- info carrera --}}
        <div class="col-lg-8">
            <p><strong>Ruta de la carrera</strong></p>
            <div class="racemap"><?php echo $races['image']?></div>
        </div>

        <div class="col-lg-4">
            <div style="color:#f0f4fa">I</div>

            <div>
                <p>{{$races['description']}}</p>
            </div>  
            <div>
                <p><strong>Desnivel :</strong> {{$races['unevenness']}} km</p>
            </div>
            <div>
                <p><strong>Numero participantes :</strong> {{$races['number_participants']}}</p>
            </div>
            <div>
                <p><strong>Distancia :</strong> {{$races['km']}} km</p>
            </div>

            <?php 
            //Girar fecha :D
            $time = strtotime($races->date);
            $format = date('d/m/Y H:i',$time);
            ?>
            <div>
                <p><strong>Fecha y hora de salida  :</strong> <?php echo $format?> </p>
            </div>
            <div>
                <p><strong>Punto de salida :</strong> {{$races['start']}}</p>
            </div>
            <div>
                <p><strong>Precio :</strong> Desde {{$races['price']}}€</p>
            </div>

    <?php $id=$races['id']; 


    //revisar

    //ver si la fecha de la carrera es más grande que hoy
    // $fecha_actual = date("d-m-Y");
    // $newDate = date("d-m-Y", strtotime($races['date'])); 


    //calcular el intervalo
    $hoy=now();
    $carrera=$races->date;
    $intervalo = $hoy->diff($carrera);

    if ($intervalo->m<=1 &&  $intervalo->d<=30 && $newDate>$fecha_actual){ ?>

    <button type="button" class="btn btn-primary inscribir"><a href="{{ url('/altaCorredor/'.$id) }}">Darse de alta</a></button>

    <?php } 

    //finalizadas
    else if($newDate<$fecha_actual){
        echo '<button type="button" class="btn btn-primary finalizada">FINALIZADA</button>';
        ?><h3> <a class="btn btn-primary" href="{{ url('/fotosPublicas/'.$id) }}" role="button">Ver fotografias</a> </h3><?php
    }

    //Aún no se puede apuntar
    else{
        echo '<button type="button" class="btn btn-primary notoday">El periodo de inscripción aún no ha empezado</button>';
    }
    ?>
        </div>
    </div>

</div>


<div class="sectionsponsorInfo">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 logosmobile"  style="margin-top: 30px">
              <div class="row justify-content-center">
                <?php $log=0;?>
                @foreach($sponsors as $sponsor)
                  <?php
                    if ($log<5){
                  ?>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <?php $image=preg_replace('([^A-Za-z0-9 ])', '', $sponsor->logo)?>
                    <a style="display:inline !important"><img class="logo mx-auto d-block" src="../../resources/img/<?php echo strtolower($image) ?>.png" alt=""></a>
                  </div>
                  <?php } $log++; ?>
                @endforeach
              </div>
            </div>
          </div>
    </div>
</div>
@endsection


