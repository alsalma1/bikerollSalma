@extends('layouts.layout')
@section('content')
<div class="container air">
        <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                            <h1 style="display:inline">Alta aseguradoras</h1>
                            <a href="{{url('/editarCarrera')}}" class="btn btn-primary float-right" style="margin-top: 10px;">Volver atrás</a>
                    </div>
                </div>
        </div>
        <hr>

    <form action="precioCarrera" method="POST">
        @csrf
        
        <?php 
        foreach($insurance as $row){ ?>
            
        <label><input type="checkbox" id="cbox1" name="opciones[]" value="{{$row['id']}}"> {{$row['name']}} - {{$row['price']}}€ </label><br>

        <?php
        }
        
        ?>

        <input type="number" value="<?php echo $idC ?>" name="idC" style="display:none">

        <br>
        <input type="submit" value="Escoger Aseguradoras" name="envio">
    </form>
</div>

@endsection