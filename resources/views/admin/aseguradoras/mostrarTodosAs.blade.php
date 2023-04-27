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
        <form action="mostrarTodosAs" method="post">
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
                    <h1 style="display:inline">Aseguradoras</h1>
                    <a href="{{url('anyadirAseguradora')}}" class="btn btn-primary float-right mr-3" style="margin: 10px 0 0 20px;">+ Nueva aseguradora</a>
                    <a href="{{url('/paginaPrincipal')}}" class="btn btn-primary float-right" style="margin-top: 10px;">Página principal</a>
                </div>
            </div>
        </div>
        <hr>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @if ($insurance->isEmpty())
                <p class="card-title">¡No se encontraron resultados para tu búsqueda!</p>
            @else
                @foreach ($insurance as $row)
                    @php
                        $id = $row['id'];
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title">{{$row['name']}}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>CIF:</strong>{{$row['CIF']}}</p>
                            <p class="card-text"><strong>Nombre:</strong> {{$row['name']}}</p>
                            <p class="card-text"><strong>Dirección:</strong> {{$row['address']}}</p>
                            <p class="card-text"><strong>Precio base:</strong> {{$row['price']}}€</p>
                            <p class="card-text"><strong>Estado:</strong>

                                @if ($row['estado'] == 0)
                                    <a href="activarAseguradora/{{$id}}"><img src="../resources/img/off.png" alt="" style="width:60px;height:60px"></a>
                                @else
                                    <a href="activarAseguradora/{{$id}}"><img src="../resources/img/on.png" alt="" style="width:60px;height:60px"></a>
                                @endif
                            </p>
                            {{-- <i class="bi bi-toggle-on"></i> --}}
                        </div>
                        <div class="card-footer">
                            <a href="editarAseguradora/{{$id}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar</a>
                        </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
      
@endsection