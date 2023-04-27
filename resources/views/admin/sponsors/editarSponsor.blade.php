<a href="{{url('/paginaPrincipal')}}">Pagina principal</a>
@extends('layouts.layout')
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border:3px solid #eee">
                    <div class="card-header" style="text-align: center"><h1>Editar Sponsor</h1></div>

                    <div class="card-body">
                        <form action="{{$sponsor['id']}}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="insuranceName" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" maxlength="100" value="{{$sponsor['name']}}" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="insuranceAddress" class="col-md-4 col-form-label text-md-right">Descripción</label>

                                <div class="col-md-6">
                                    <textarea name="desc" id="desc" cols="21" rows="5" class="form-control" required>{{$sponsor['description']}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="insuranceAddress" class="col-md-4 col-form-label text-md-right">Plana principal</label>

                                <div class="col-md-6" style="margin-top: 10px">
                                    @if($sponsor['main_plain'] == 0)
                                        <input type="radio" id="opt1" name="pp" value="1"/>
                                        <label for="op1">Sí</label>
                                        <input type="radio" id="op2" name="pp" value="0" checked="checked" style="margin-left: 10px"/>
                                        <label for="op2">No</label>
                                    @else
                                        <input type="radio" id="opt1" name="pp" value="1" checked="checked"/>
                                        <label for="op1">Sí</label>
                                        <input type="radio" id="op2" name="pp" value="0" style="margin-left: 10px"/>
                                        <label for="op2">No</label>
                                    @endif                                
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" name="edit">Editar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection