<style>
        *{
        font-family: Arial, Helvetica, sans-serif;
        margin-left: 30px;
    }
    body{
        margin-bottom: 50px;
        margin-top: 50px; 
    }
    table{
        width: 60%;
        border-collapse: collapse;
        text-align: center;
    }
    td{
        width: 15%;
        padding: 14px;
        border-bottom: 1px solid black;
        text-align: left;
        text-align: center;
    }
    th{
        padding: 8px;
        border-bottom: 1px solid black;
        text-align: left;
        background-color: #d7e1f5;
        text-align: center;
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
    .qr img{
        height: 100px;
        width: 100px;
    }
</style>
<?php
    $id_race = $id;
?>
<h1>Corredores apuntados</h1>
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dorsal</th>
            <th>QR</th>
        </tr>
    </thead>
    <tbody>
        @foreach($runners as $runner)
            <tr>
                <td>{{$runner->name}}</td>
                <td>{{$runner->last_name}}</td>
                <td>{{$runner->dorsal}}</td>
                <td>                            
                    <?php
                    $id_runner = $runner->id;
                    //Link de la pagina en real
                    //$url = route('datosQr' , ['id_runner' => $id_runner , 'id_race' => $id_race]);
                    $url = "http://www.dianasalma-pruebas.com.mialias.net/bikerollSalma/public/datosQr/$id_runner/$id_race";
                    ?>
                    <div class="qr">{!! QrCode::size(100)->backgroundColor(255, 255, 255)->color(0,0,0)->generate($url) !!}</div>
                    <small>{{$url}}</small>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>