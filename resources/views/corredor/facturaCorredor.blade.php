<link href="http://localhost/bikerollSalma/resources/sass/app.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<?php 
    $importe_total = 0;
    $precio_aseguradora = 0;
    $fecha = date('d/m/Y H:i', strtotime($results[0]->date));
?>
<div class="container">
    <div class="row justify-content-center" style="margin-top: 20px">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <h1 class="mt-2">Factura</h1>
                </div>
            <div class="card">
                <div class="card-header" style="background-color: #687ca0;color:white"><h5>Datos del corredor</h5></div>
                <div class="card-body">
                    <h4 class="card-text">{{$results[0]->nameR." ".$results[0]->last_name}}</h4>
                    <div class="card-body">
                        <p class="card-text" style="margin-left: 30px"><strong>Dirección:</strong> {{$results[0]->adress}}</p>
                        @if($results[0]->federation_number != NULL)
                        <p class="card-text" style="margin-left: 30px"><strong>Nº de fedarado:</strong> {{$results[0]->federation_number}}</p>
                        @endif
                        <p class="card-text" style="margin-left: 30px"><strong>Email:</strong> {{$results[0]->name}}@gmail.com</p>
                    </div>   
                </div>
            </div>

            <div class="mt-4">
                <h2>Datos carrera</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>km</th>
                            <th>Fecha</th>
                            <th>Salida</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>{{$item->km}}</td>
                                <td>{{$fecha}}</td>
                                <td>{{$item->start}}</td>
                                <td>{{$item->race_price}}€</td>
                            </tr>
                            <?php $importe_total = $item->race_price; ?>
                        @endforeach
                    </tbody>
                </table>
            <div class="mt-4" style="float:right;color:black">
                @if($results[0]->id_insurances != NULL)
                    <?php
                        $precio_aseguradora = $results[0]->insurance_price;
                    ?>
                    <p style="display:block;margin:30px 0 30px 0;padding-bottom:30px;border-bottom:1px solid grey">Precio aseguradora: {{$precio_aseguradora}}€ </p>                                
                @endif
                <h2 class="mb-2" style="display:inline; ">Importe total: </h2>
                <p style="display:inline;font-size:20px;color:blue" class="price">{{$importe_total+=$precio_aseguradora}}€</p>
            </div>
        </div>
    </div>
</div>