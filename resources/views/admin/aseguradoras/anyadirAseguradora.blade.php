@extends('layouts.layout')

@section('content')
    <div class="container mt-3 air">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{url('mostrarTodosAs')}}" class="btn btn-primary float-right mr-3" style="margin: 10px 0 0 10px;">Ver aseguradoras</a>
                <a href="{{url('/paginaPrincipal')}}" class="btn btn-primary float-right" style="margin-top: 10px;">Página principal</a>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border:3px solid #eee">
                    <div class="card-header" style="text-align: center"><h1>Añadir nueva aseguradora</h1></div>

                    <div class="card-body">
                        <form action="anyadirAseguradora" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="cif" class="col-md-4 col-form-label text-md-right">CIF</label>

                                <div class="col-md-6">
                                    <input type="text" name="cif" id="cif" class="form-control" minlength="9" maxlength="9" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="insuranceName" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input type="text" name="insuranceName" id="insuranceName" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="insuranceAddress" class="col-md-4 col-form-label text-md-right">Dirección</label>

                                <div class="col-md-6">
                                    <input type="text" name="insuranceAddress" id="insuranceAddress" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="insuranceAddress" class="col-md-4 col-form-label text-md-right">Precio base</label>

                                <div class="col-md-6">
                                    <input type="number" name="price" id="insurancePrice" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" name="create">Crear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection