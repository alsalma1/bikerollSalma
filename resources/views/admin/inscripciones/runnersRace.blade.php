@extends('layouts.layout')

@section('content')
<?php
    $id_race = $id;
?>

<div class="container mt-5">
    <h1 class="mb-4">Corredores apuntados en la carrera {{$id_race}}</h1>
    {{-- ------------------- Buscador ------------------------------------------- --}}
    <div class="row">
        <div class="col-md-6">
            <form action="{{$id_race}}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" name="buscador" class="form-control" placeholder="Buscar por nombre o precio...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="buscButton">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- ------------------------------------------------------------------------- --}}
    <div class="container mt-3 air">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{url('/paginaPrincipal')}}" class="btn btn-primary float-right" style="margin-top: 10px;">Página principal</a>
                <a href="{{url('imprimirDorsales')}}/{{$id_race}}" class="btn btn-primary float-right" style="margin-top: 10px;">Imprimir dorsales</a>
            </div>
        </div>
    </div>
    @if(count($runners)==0)
        <p>¡No se han encontrado resultados!</p>
    @else
        <div class="row mt-4">
            @foreach($runners as $runner)
                @php
                    //Calcular la edad de la persona depende de su fecha de nacimiento
                    $edad = now()->diff($runner->birth_date)->y;
                @endphp

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">{{$runner->name . ' ' . $runner->last_name}}</h2>
                            <h6 class="card-subtitle mb-2 text-muted">{{$edad}} años</h6>
                            {{-- Sexo --}}
                            @if($runner->sex == 1)
                                <p class="card-text"><strong>Género:</strong> Mujer</p>
                            @else
                                <p class="card-text"><strong>Género:</strong> Hombre</p>
                            @endif
                            <p class="card-text"><strong>Dirección:</strong> {{$runner->adress}}</p>
                            {{-- Si es pro muestra el numero de federacion --}}
                            @if($runner->pro == 1)
                                <p class="card-text"><strong>Pro:</strong> Sí</p>
                                <p class="card-text"><strong>Número de federación:</strong> {{$runner->federation_number}}</p>
                            @else
                                <p class="card-text"><strong>Pro:</strong> No</p>
                                <p class="card-text"><strong>Número de federación:</strong> ----</p>
                            @endif
                            <p class="card-text"><strong>Dorsal:</strong> {{$runner->dorsal}}</p>
                            <p class="card-text"><strong>Puntos:</strong> {{$runner->points}}</p>

                            <?php
                                $id_runner = $runner->id;
                                //Link de la pagina en real
                                //$url = route('datosQr' , ['id_runner' => $id_runner , 'id_race' => $id_race]);
                                $url = "http://www.dianasalma-pruebas.com.mialias.net/bikerollSalma/public/datosQr/$id_runner/$id_race";
                            ?>
                            <div class="qr">{!! QrCode::size(100)->backgroundColor(255, 255, 255)->color(0,0,0)->generate($url) !!}</div>
                            {{$url}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
