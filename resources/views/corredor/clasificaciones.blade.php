<style>
    *{
        font-family: Arial, Helvetica, sans-serif;
        margin-left: 30px;
    }
    body{
        margin-bottom: 50px; 
    }
    table{
        width: 60%;
        border-collapse: collapse;
        text-align: center;
    }
    td{
        width: 10%;
        /* border: 1px solid black; */
    }
    td{
        padding: 14px;
        border-bottom: 1px solid black;
        text-align: left;
    }
    th{
        padding: 8px;
        border-bottom: 1px solid black;
        text-align: left;
        background-color: #d7e1f5;
    }
    hr{
        height: 4px;
        background-color: #687ca0;
    }
    th:first-child, td:first-child { 
    border-left: none; /* Elimina el borde izquierdo de la primera celda */
    }
    th:last-child, td:last-child {
        border-right: none; /* Elimina el borde derecho de la última celda */
    }
    .copas{
        width: 50px;
        height: 50px;
    }
</style>

<div class="container air" style="margin-top:40px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="display:inline;color:black">Clasificación por género</h1>
            </div>
        </div>
    </div>
    <hr>
    <h4 class="mb-3">Hombres</h4>
    <table class="table air">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Posición</th>
                <th scope="col">Género</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Puntos</th>
            </tr>
        </thead>
        <tbody class="clasifications">
            <?php $cont=0; ?>
            @foreach($masculino as $f)
            <?php
            if($cont<10){ ?>
                <tr>
                    @if ($cont==0)
                    <td><img src="http://localhost/bikerollSalma/resources/img/copa-de-oro.png" class="copas"></td>
                    @elseif ($cont==1)
                    <td><img src="http://localhost/bikerollSalma/resources/img/copa-de-plata.png" class="copas"></td>
                    @elseif($cont==2)
                    <td><img src="http://localhost/bikerollSalma/resources/img/copa-de-bronce.png" class="copas"></td>
                    @else
                    <td><img src="http://localhost/bikerollSalma/resources/img/medalla.png" class="copas"></td>
                    @endif

                <td scope="row"><?php echo $cont+1; ?></td>
                @if ($f->sex == 0)
                    <td>Mujer</td>
                @else
                    <td>Hombre</td>
                @endif
                <td>{{$f->name}}</td>
                <td>{{$f->last_name}}</td>
                <td>{{$f->points}}</td>
            <?php 
            //Limit 10
            $cont++;
            } 
            ?>
            @endforeach
        </tbody>
    </table>

    <h4>Mujeres</h4>
    <table class="table air">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Posición</th>
                <th scope="col">Género</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Puntos</th>
            </tr>
        </thead>
        <tbody class="clasifications">
            <?php $cont=0; ?>
            @foreach($femenino as $f)
            <?php
            if($cont<10){ ?>
                <tr>
                    @if ($cont==0)
                    <td><img src="http://localhost/bikerollSalma/resources/img/copa-de-oro.png" class="copas"></td>
                    @elseif ($cont==1)
                    <td><img src="http://localhost/bikerollSalma/resources/img/copa-de-plata.png" class="copas"></td>
                    @elseif($cont==2)
                    <td><img src="http://localhost/bikerollSalma/resources/img/copa-de-bronce.png" class="copas"></td>
                    @else
                    <td><img src="http://localhost/bikerollSalma/resources/img/copa-de-plata.pngmedalla.png" class="medalla"></td>
                    @endif

                <td scope="row"><?php echo $cont+1; ?></td>
                @if ($f->sex == 0)
                    <td>Mujer</td>
                @else
                    <td>Hombre</td>
                @endif
                <td>{{$f->name}}</td>
                <td>{{$f->last_name}}</td>
                <td>{{$f->points}}</td>
            <?php 
            //Limit 10
            $cont++;
            } 
            ?>
            @endforeach
        </tbody>
    </table>
    


{{-- ------------------------------------------------------------------------------------------- --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1></h1>
                <h1></h1>
                <h1 style="display:inline;color:black">Clasificación por edad</h1>
            </div>
        </div>
    </div>
    <hr>
    @php
        $groups = [
            'master20' => [],
            'master30' => [],
            'master40' => [],
            'master50' => [],
            'master60' => []
        ];
        foreach($runners as $runner) {
            $edad = now()->diff($runner->birth_date)->y;
            if ($edad > 19 && $edad <= 29) {
                $groups['master20'][] = $runner;
            } elseif ($edad > 29 && $edad <= 39) {
                $groups['master30'][] = $runner;
            } elseif ($edad > 39 && $edad <= 49) {
                $groups['master40'][] = $runner;
            } elseif ($edad > 49 && $edad <= 59) {
                $groups['master50'][] = $runner;
            } elseif ($edad > 59 && $edad <= 69) {
                $groups['master60'][] = $runner;
            }
        }
    @endphp
    @foreach($groups as $key => $group)
        @if(!empty($group))
            <?php
                $titulo = str_replace("master", "Master ", $key); 
            ?>
            <h4>{{ $titulo }}</h4>
            <table class="table air">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Posición</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Puntos</th>
                    </tr>
                </thead>
                <tbody class="clasifications">
                    <?php $cont = 0; ?>
                    @foreach($group as $runner)
                        @if($cont < 10)
                            <tr>
                                @if ($cont == 0)
                                    <td><img src="http://localhost/bikerollSalma/resources/img/copa-de-oro.png" class="copas"></td>
                                @elseif ($cont == 1)
                                    <td><img src="http://localhost/bikerollSalma/resources/img/copa-de-plata.png" class="copas"></td>
                                @elseif($cont == 2)
                                    <td><img src="http://localhost/bikerollSalma/resources/img/copa-de-bronce.png" class="copas"></td>
                                @else
                                    <td><img src="http://localhost/bikerollSalma/resources/img/medalla.png" class="copas"></td>
                                @endif
                                <td scope="row">{{ $cont + 1 }}</td>
                                <?php $cont++; ?>
                                <td>{{ now()->diff($runner->birth_date)->y }}</td>
                                <td>{{ $runner->name }}</td>
                                <td>{{ $runner->last_name }}</td>
                                <td>{{ $runner->points }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
    @endforeach


</div>

</div>

