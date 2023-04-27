@extends('layouts.layout')
{{-- Para mostrar la alerta con el mensaje --}}
@if (session('mensaje'))
    <script>
        alert('{{ session('mensaje') }}');
    </script>
@endif
{{-- -------------------------------------- --}}
@section('content')

    <div class="container air">
        <form action="mostrarSponsors" method="post">
            @csrf
            <div class="input-group col-lg-12" style="margin:20px 0 20px;">
                <input type="text" name="buscador" class="form-control col-lg-12" placeholder="Búsqueda..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <input type="submit" value="Buscar" name="buscButton" class="btn btn-outline-secondary" type="button">
                </div>
            </div>
        </form>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="display:inline">Sponsors</h1>
                    <a href="{{url('anyadirSponsor')}}" class="btn btn-primary float-right mr-3" style="margin: 10px 0 0 20px;">+ Nuevo Sponsor</a>
                    <a href="{{url('/paginaPrincipal')}}" class="btn btn-primary float-right" style="margin-top: 10px;">Página principal</a>
                </div>
            </div>
        </div>
        <hr>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @if ($sponsor->isEmpty())
                <p class="card-title">¡No se encontraron resultados para tu búsqueda!</p>
            @else
                @foreach ($sponsor as $row)
                    @php
                        $id = $row['id'];
                        $logo=preg_replace('([^A-Za-z0-9 ])', '', $row['logo']);
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                        <div class="card-header">
                            <img class="card-img-top" src="	http://localhost/bikerollSalma/resources/img/<?php echo strtolower($logo) ?>.png" alt="Card image cap">
                            <h2 class="card-title">{{ $row['name'] }}</h2>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $row['description'] }}</p>
                            <p class="card-text"><strong>Plana principal:</strong>
                                @if($row['main_plain'] == 0)
                                    No
                                @else
                                    Sí
                                @endif
                            </p>
                            <p class="card-text"><strong>Estado:</strong>
                                @if ($row['sponsorState'] == 0)
                                    <a href="activarSponsor/{{$id}}"><img style="width:40px;height:40px" src="	http://localhost/bikerollSalma/resources/img/off.png" alt=""></a>
                                @else
                                    <a href="activarSponsor/{{$id}}"><img style="width:40px;height:40px" src="	http://localhost/bikerollSalma/resources/img/on.png" alt=""></a>
                                @endif
                            </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="editarSponsor/{{$id}}" class="btn btn-primary mx-2"><i class="bi bi-pencil-square"></i> Editar datos</a>
                                <a href="editarLogo/{{$id}}" class="btn btn-primary"><i class="bi bi-image"></i> Editar logo</a>
                                <a href="selectRaces/{{$id}}" class="btn btn-primary" style="margin-top:5px;"><i class="bi bi-check-square"></i> Seleccionar carreras</a>
                                <a href="carreras-sponsor/{{$id}}" class="btn btn-primary" style="margin-top:5px;"><i class="bi bi-calendar-event"></i> Ver carreras patrocinadas</a>
                                <a href="download-pdf/{{$id}}" class="btn btn-primary" style="width:100%;background-color:#243B66 !important;margin-top:20px;"><i class="bi bi-file-earmark-pdf"></i> Descargar factura</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
      </div>
      
@endsection