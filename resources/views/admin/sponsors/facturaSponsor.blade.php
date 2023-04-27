<link href="http://localhost/bikerollSalma/resources/sass/app.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<?php 
    $plana_principal = 0;
    $importe_total = 0;
    $logo=preg_replace('([^A-Za-z0-9 ])', '', $facturaSponsor[0]->logo);
?>
<div class="container">
    <div class="row justify-content-center" style="margin-top: 20px">
        <div class="col-md-8">
            <div class="text-center mb-4">
            <img src="http://localhost/bikerollSalma/resources/img/<?php echo strtolower($logo) ?>.png" alt="">
            <h1 class="mt-2">{{$facturaSponsor[0]->name}}</h1>
            </div>

            <div class="card">
                <div class="card-header" style="background-color: #687ca0;color:white">Datos del sponsor</div>
                <div class="card-body">
                    <p class="card-text">{{$facturaSponsor[0]->description}}</p>
                </div>
            </div>

            <div class="mt-4">
                <h2>Carreras patrocinadas</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facturaSponsor as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>{{$item->price}}€</td>
                            </tr>
                            <?php
                                $importe_total += $item->price;
                                $plana_principal = $item->main_plain;
                            ?>
                        @endforeach
                    </tbody>
                </table>

                {{-- @if($plana_principal == 1) --}}
                    <div class="mt-4">
                        <h6></h6>
                        <p><strong>Coste plana principal: </strong> 30€</p>
                    </div>
                {{-- @endif --}}
            </div>

            <div class="mt-4" style="float:right;font-weight:bold">
                <p style="display:inline; margin-right:10px;">Importe total: </p>
                @if($plana_principal == 1)
                    <p style="display:inline;font-size:20px;color:blue" class="price">{{$importe_total+=30}}€</p>
                @else
                    <p style="display:inline;font-size:20px;color:blue" class="price">{{$importe_total}}€</p>
                @endif
            </div>
        </div>
    </div>
</div>
