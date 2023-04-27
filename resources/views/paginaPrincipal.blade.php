@extends('layouts.layout')
{{-- Para escribir el contenido de la pagina, hay que hacer una section con mismo nombre del yield en el archivo layout.balde.php  --}}
@section('content')
<div id="portada">
    <img class="portada" src="../resources/img/Portada.png">
    <div class="textoportada">
    <h1 class="titulo">BIKEROLL</h1>
        <button type="button"  class="btn btn-primary portadabuttonright portadacommon"><a href="#about-section">Visitar la web</a></button>
    </div>
</div>

<section id="about-section" class="pt-5 pb-5">
    <div class="container wrapabout">
        <div class="red"></div>
        <div class="row">
            <div class="col-lg-8 col-sm-6 align-items-center justify-content-left d-flex mb-5 mb-lg-0 col-xs-4">
                <div class="blockabout">
                    <div class="blockabout-inner text-center text-sm-start">
                        <div class="title-big pb-3 mb-3">
                            <h3 class="dob">Bienvenid@ a Bikeroll</h3>
                        </div>
                        <p class="description-p text-muted pe-0 pe-lg-0">
                            Somos una empresa dedicada a la gestión de carreras de bicicletas para todos los niveles de ciclistas, desde principiantes hasta profesionales.<br>
                            Nuestro objetivo es crear experiencias únicas y emocionantes para los ciclistas, al mismo tiempo que proporcionamos un ambiente seguro y bien organizado para todos los participantes.                        
                        </p>
                        <p class="description-p text-muted pe-0 pe-lg-0"> Descubre nuevas rutas, conoce a otros ciclistas apasionados y disfruta de una experiencia de carrera única. ¡Te esperamos en nuestra próxima carrera!</p>
                        <div class="sosmed-horizontal pt-3 pb-3">
                            <a target="_blank" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="https://twitter.com/?lang=es"><i class="fa fa-instagram"></i></a>
                            <a target="_blank" href="https://www.pinterest.es/"><i class="fa fa-pinterest"></i></a>
                        </div>
                        <a href="#carrerasprincipales" class="btn rey-btn mt-3">Próximas Carreras</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mt-5 mt-lg-0">
                <figure class="potoaboutwrap">
                    <img src="../resources/img/aboutus.png" alt="potoabout" />
                </figure>
            </div>
        </div>
    </div>
</section>


<div style="background-color:#f0f4fa;"  id="carrerasprincipales">
    <div class="container">
        <div class="divCarreras">
            <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 style="display:inline">Próximas Carreras</h1>
                        </div>
                    </div>
            </div>
            <hr>

    
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php $limit=0; ?>
                @foreach($races as $race)
                    <?php
                    if ($limit<3){
                        $id = $race['id'];

                        //control de fechas ESTO SÍ QUE FUNCIONA
                        $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
                        $newDate = strtotime($race['date']); 

                    if ($newDate>$fecha_actual){
                    ?>


                    <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title">{{$race['title']}}</h5>
                    </div>
                    <div class="card-body">
                        <?php $prom=preg_replace('([^A-Za-z0-9 ])', '', $race['promotion'])?>
                        <p class="card-text" style="max-height:300px !important;text-align:center"><img src="../resources/img/<?php echo strtolower($prom) ?>.jpg" alt="" style="margin:0 auto;max-height:250px !important;"></p>
                        
                        <p class="card-text"><strong> </strong> {{$race['description']}}</p>
                        <p class="card-text"><strong>Salida:</strong> {{$race['start']}}</p>
                        <p class="card-text"><strong>Distancia:</strong> {{$race['km']}} km</p>

                        <?php
                        $time = strtotime($race['date']);
                        $format = date('d/m/Y H:i',$time);
                        ?>
                        <p class="card-text"><strong>Fecha:</strong> <?php echo $format ?></p>

                        
                        <!-- <p class="card-text"><a href="infoRace/{{$id}}"><div class="btn btn-primary but info" style="text-align:center">Más información</div></a></p> -->
                        <!-- <div class="card-footer"> -->
                        <a href="infoRace/{{$id}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Más información</a>
                        <!-- </div> -->
                    </div>
                    
                    </div>
                    </div>
                    <?php 
                    $limit++;
                    }
                    }
                    ?>
                @endforeach 
        </div>
        </div>
    </div>
</div>


<div class="sectionsponsor">
    <div class="container">
        <div class="container">
            <div class="tituloSpons">
                <div class="col-lg-12">
                    <h1 style="display:inline">Sponsors</h1>
                </div>
            </div>
        </div>
    
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 logosmobile"  style="margin-top: 30px">
              <div class="row justify-content-center">
                <?php $log=0;?>
                @foreach($sponsors as $sponsor)
                  <?php
                    $id = $sponsor['id'];
                    if ($log<5){
                  ?>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <?php $image=preg_replace('([^A-Za-z0-9 ])', '', $sponsor['logo'])?>
                    <a style="display:inline !important"><img class="logo mx-auto d-block" src="../resources/img/<?php echo strtolower($image) ?>.png" alt=""></a>
                  </div>
                  <?php } $log++; ?>
                @endforeach
              </div>
            </div>
          </div>
    </div>
</div>

<div style="background-color:#f0f4fa;" class="section">
    <div class="container">
    <!-- Finalizadas -->
        <div class="row">
                <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 style="display:inline">Carreras Recientes</h1>
                                </div>
                            </div>
                    </div>
                    <hr>
                <?php $cont=0; ?>
                @foreach($fin as $f)
                    <?php
                    if($cont<2){
                        $id = $f['id'];

                        $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
                        $newDate = strtotime($f['date']); 

                        $hoy=now();
                        $carrera=$f->date;
                        $intervalo = $hoy->diff($carrera);

                        //Cogemos las carreras del ultimo mes con limite de 2, lo cogemos por descendente por lo tanto siempre saldrá la mas cercana primero
                        if ($newDate<$fecha_actual && $intervalo->m<=3){
                    ?>

                    <div class="col-lg-6 col-md-6">
                                        <div class="card h-100">
                                        <div class="card-header">
                                            <h5 class="card-title">{{$f['title']}}</h5>
                                        </div>
                                        <div class="card-body">
                                        <?php $prom=preg_replace('([^A-Za-z0-9 ])', '', $f['promotion'])?>
                                        <p class="card-text" style="max-height:500px !important;text-align:center"><img src="../resources/img/<?php echo strtolower($prom) ?>.jpg" alt="" style="margin:0 auto;max-height:300px !important;max-width:500px;"></p>
                                        <p class="card-text"><strong> </strong> {{$f['description']}}</p>
                                        <?php
                                        $time = strtotime($f['date']);
                                        $format = date('d/m/Y H:i',$time);
                                        ?>
                                        <p class="card-text"><strong>Fecha:</strong> <?php echo $format ?></p>

                                        <a href="infoRace/{{$id}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Más información</a>



                                        </div>
                                        </div>
                    
                    </div>
                    

                    <!-- <div class="col-lg-4 col-sm-6">
                        <?php $prom=preg_replace('([^A-Za-z0-9 ])', '', $f['promotion'])?>
                        <img class="carrerasproximas"  src="../resources/img/<?php echo strtolower($prom) ?>.jpg" alt="">
                        <h2>{{$f['title']}}</h2>
                        <p>{{$f['description']}}</p>
                        <p>{{$f['date']}}</p>
                        <a href="infoRace/{{$id}}"><div class="info but"><p>Más información</p></div></a>
                    </div> -->
                        <?php 
                    //Limit 2
                    $cont++;
                    } 
                }?>
                @endforeach
            
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection