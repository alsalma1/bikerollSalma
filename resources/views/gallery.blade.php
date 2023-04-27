@extends('layouts.layout')
@section('content')

<div class="container air">

<div class="container">
                <div class="row">
                    <div class="col-lg-12">
                            <h1 style="display:inline"><?php echo $carreras['title']?></h1>
                    </div>
                </div>
                </div>
                <hr>


    <!-- Cuando llega a los extremos se para pero :v -->

    <?php if ($fotos->count()==0){
                echo '<p>No hay fotos disponibles </p>';
            } else{ ?>

        <div class="col-lg-12">
            @foreach($fotos as $foto)
            <!-- <div class="col-lg-4"> -->
            <img src="http://www.dianasalma-pruebas.com.mialias.net/bikerollSalma{{$foto['image']}}" alt="" style="width:200px;height:100px">
            <!-- </div> -->
           
            @endforeach
        </div>
            
        
    <!-- <div id="carouselExampleIndicators" class="carousel slide viewF" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <?php $active=0;?>
            @foreach($fotos as $foto)
            <?php if($active==0){ ?>
            <div class="carousel-item active">
            <?php $image=preg_replace('([^A-Za-z0-9 ])', '', $foto['image'])?>
            <img src="../../resources/img/<?php echo strtolower($image) ?>.jpg" class="d-block w-100" alt="...">
            </div>
            <?php $active++;}

            else{?>
                <div class="carousel-item">
            <?php $image=preg_replace('([^A-Za-z0-9 ])', '', $foto['image'])?>
            <img src="../../resources/img/<?php echo strtolower($image) ?>.jpg" class="d-block w-100" alt="...">
            </div>
            <?php }
            ?>
            @endforeach
            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button> -->
    <!-- </div> -->
    <?php }?>
</div>
@endsection