@extends('layouts.layout')
{{-- Para escribir el contenido de la pagina, hay que hacer una section con mismo nombre del yield en el archivo layout.balde.php  --}}
@section('content')

<div id="portada">
    <img class="portada" src="../resources/img/clasificacion.png">
</div>

<div class="container" style="margin-top:40px">
            <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 style="display:inline">Clasificación general</h1>
                        </div>
                    </div>
            </div>
            <hr>
                    <table class="table air">
                    <thead style="background-color:#f0f4fa !important;">
                        <tr>
                        <th scope="col"></th>
                        <th scope="col">Posicion</th>
                        <th scope="col">Puntos</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        </tr>
                    </thead>
                    <tbody class="clasifications">
                        <?php $cont=0; ?>
                        @foreach($runners as $f)
                        <?php
                        if($cont<10){ ?>
                            <tr>
                                @if ($cont==0)
                                <td><img src="../resources/img/copa-de-oro.png" class="copas"></td>
                                @elseif ($cont==1)
                                <td><img src="../resources/img/copa-de-plata.png" class="copas"></td>
                                @elseif($cont==2)
                                <td><img src="../resources/img/copa-de-bronce.png" class="copas"></td>
                                @else
                                <td><img src="../resources/img/medalla.png" class="medalla"></td>
                                @endif

                            <th scope="row"><?php echo $cont+1; ?></th>
                            <td>{{$f['points']}}</td>
                            <td>{{$f['name']}}</td>
                            <td>{{$f['last_name']}}</td>
                        <?php 
                        //Limit 10
                        $cont++;
                        } 
                        ?>
                        @endforeach
                    </tbody>
                    </table>


                    <div class="col-lg-12 col-md-12 air" >
                        <div class="card h-100">
                        <div class="card-header" style="background-color:#f0f4fa !important;">
                            <h5 class="card-title">Otras clasificaciones</h5>
                        </div>
                        <div class="card-body">
                        
                            <a href="#" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Clasificación masculina</a>
                            <a href="#" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Clasificación femenina</a>
                            
                        </div>
                        
                        </div>
                    </div>
            

</div>


@endsection