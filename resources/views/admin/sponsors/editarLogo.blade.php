@extends('layouts.layout')

    <h1>Editar logo aseguradora</h1>
@section('content')

<div class="container air" style="margin-top: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{url('mostrarSponsors')}}" class="btn btn-primary float-right mr-3" style="margin: 10px 0 0 20px;">Sponsors</a>
                <a href="{{url('/paginaPrincipal')}}" class="btn btn-primary float-right" style="margin-top: 10px;">Página principal</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border:3px solid #eee">
                <div class="card-header" style="text-align: center">
                    <h1>Editar logo sponsor</h1>
                </div>

                <div class="card-body" style="margin-top: 20px">
                    <form action="{{$sponsor['id']}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col">
                            <input type="file" class="form-control" name="logo" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection