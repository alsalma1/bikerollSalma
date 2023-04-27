@extends('layouts.layout')

@section('content')
    <div class="container mt-3 air">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{url('mostrarSponsors')}}" class="btn btn-primary float-right mr-3" style="margin: 10px 0 0 10px;">Ver sponsors</a>
                <a href="{{url('/paginaPrincipal')}}" class="btn btn-primary float-right" style="margin-top: 10px;">Página principal</a>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border:3px solid #eee">
                    <div class="card-header" style="text-align: center"><h1>Añadir nuevo sponsor</h1></div>

                    <div class="card-body">
                        <form action="anyadirSponsor" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="cif" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" maxlength="100" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="insuranceName" class="col-md-4 col-form-label text-md-right">Descripción</label>

                                <div class="col-md-6">
                                    <textarea name="desc" id="desc" cols="21" rows="5" class="form-control" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="insuranceAddress" class="col-md-4 col-form-label text-md-right">Logo</label>

                                <div class="col-md-6">
                                    <input type="file" name="logo" id="logo"required>
                                </div>
                            </div>

                            <div class="form-group row" >
                                <label for="insuranceAddress" class="col-md-4 col-form-label text-md-right">Plana principal</label>

                                <div class="col-md-6" style="margin-top:10px">
                                    {{-- <input type="number" name="price" id="insurancePrice" class="form-control" required> --}}
                                    <input type="radio" id="opt1" name="pp" value="1" required/>
                                    <label for="op1">Sí</label>
                                    
                                    <input type="radio" id="op2" name="pp" value="0"/>
                                    <label for="op2">No</label>
                                </div>
                            </div>
                            <div id="mensaje" style="color: red; margin-top: 10px;"></div>
                            <script>
                                // Obtener los elementos de radio button
                                var opciones = document.getElementsByName('pp');
                            
                                // Agregar un evento change a cada elemento de radio button
                                for (var i = 0; i < opciones.length; i++) {
                                    opciones[i].addEventListener('change', function() {
                                        // Verificar si la opción "Sí" está seleccionada
                                        if (this.value == 1) {
                                            // Mostrar un mensaje si la opción "Sí" está seleccionada
                                            document.getElementById('mensaje').innerHTML = "<p>Se suman 30€ al precio de la carrera</p>";
                                        }
                                        else{
                                            document.getElementById('mensaje').innerHTML = "";
                                        }
                                    });
                                }
                            </script>
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