@extends('layouts.layout')
{{-- Para escribir el contenido de la pagina, hay que hacer una section con mismo nombre del yield en el archivo layout.balde.php  --}}
@section('content')

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="http://localhost/bikerollSalma/resources/pics/race3.jpg" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="http://localhost/bikerollSalma/resources/pics/race2.jpg" class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="http://localhost/bikerollSalma/resources/pics/race1.jpg" class="d-block w-100" alt="Imagen 3">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

<div style="background-color:#">

<div class="container">
        <form action="theraces" method="post">
            @csrf
            <div class="input-group col-lg-12" style="padding:20px 0 20px;">
                
                    <input type="text" name="buscador" class="form-control col-lg-12" placeholder="Búsqueda..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <input type="submit" value="Buscar" name="buscButton" class="btn btn-outline-secondary" type="button">
                        </div>
            </div>
        </form>

       
            <div class="divCarreras">
            <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 style="display:inline">Próximas Carreras</h1>
                        </div>
                    </div>
            </div>
            <hr>

        
                <div class="row">
                    <?php $limit=0; ?>
                    @foreach($races as $race)
                        <?php
                        if ($limit!=12){
                            $id = $race['id'];

                            //control de fechas ESTO SÍ QUE FUNCIONA
                            $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
                            $newDate = strtotime($race['date']); 

                        if ($newDate>$fecha_actual){
                        ?>
                         <div class="col-lg-3 col-md-6" id="cards" style="margin:20px 0 20px 0;">
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
                                //Girar fecha :D
                                $time = strtotime($race->date);
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

                    <?php if ($races->count()==0){
                        echo '<p> No hay coincidencias </p>';
                    }
                    ?>

                </div>
            </div>
        </div>
</div>
<div style="background-color:#f0f4fa;" id="carrerasfin">
        <!-- Fotos -->
        <div class="container">
            <!-- Finalizadas -->
            <div class="row">
            <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 style="display:inline">Últimas carreras finalizadas</h1>
                        </div>
                    </div>
            </div>
            <hr>
                    <?php $cont=0; ?>
                    @foreach($fin as $f)
                        <?php
                        if($cont<4){
                            $id = $f['id'];

                            $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
                            $newDate = strtotime($f['date']); 

                            $hoy=now();
                            $carrera=$f->date;
                            $intervalo = $hoy->diff($carrera);

                            //Cogemos las carreras del ultimo mes con limite de 2, lo cogemos por descendente por lo tanto siempre saldrá la mas cercana primero
                            if ($newDate<$fecha_actual && $intervalo->m<=3){
                        ?>
                        <div class="col-lg-3 col-md-6" id="cards">
                                        <div class="card h-100">
                                        <div class="card-header">
                                            <h5 class="card-title">{{$f['title']}}</h5>
                                        </div>
                                        <div class="card-body">
                                        <?php $prom=preg_replace('([^A-Za-z0-9 ])', '', $f['promotion'])?>
                                        <p class="card-text"style="max-height:300px !important;text-align:center"><img src="../resources/img/<?php echo strtolower($prom) ?>.jpg" alt="" style="margin:0 auto;max-height:250px !important;"></p>
                                        <p class="card-text"><strong> </strong> {{$f['description']}}</p>
                                        <?php 
                                        //Girar fecha :D
                                        $time = strtotime($f->date);
                                        $format = date('d/m/Y H:i',$time);
                                        ?>
                                        <p class="card-text"><strong>Fecha:</strong> <?php echo $format ?></p>

                                        <a href="infoRace/{{$id}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Más información</a>



                                        </div>
                                        </div>
                    
                    </div>
                            <?php 
                        //Limit 2
                        $cont++;
                        } 
                    }?>
                    @endforeach

                    <?php if ($fin->count()==0){
                        echo '<p> No hay coincidencias </p>';
                    }
                    ?>
                </div>
        </div>
</div>
@endsection