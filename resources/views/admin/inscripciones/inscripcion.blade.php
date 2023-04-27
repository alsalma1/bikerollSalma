<style>
    div{
        border: 1px solid;
        width: 25%;
        height: 500px;
    }
    img{
        width: 200px;
    }
    .pdf{
        background-color:black;
        color: white;
        padding: 10px 20px; 
        margin-left: 50px;
    }
</style>
<h1>Carreras</h1>

{{-- ------------------- Buscador ------------------------------------------- --}}
<form action="verCorredores" method="post">
    @csrf
    <input type="text" name="buscador" id="busc">
    <input type="submit" value="Buscar" name="buscButton">
</form>
{{-- ------------------------------------------------------------------------- --}}
@if(count($races) == 0)
    <div>
        <p>No se ha encontrado ningún resultado</p>
        <a href="anyadirCarrera"><p>Crear nueva carrera</p></a>
    </div>
@else
    @foreach($races as $race)
    <div>
        <?php
            $id = $race->id;
            $image=preg_replace('([^A-Za-z0-9 ])', '', $race->image);
            $date = new DateTime($race->date);
        ?>
        <a href="runnersRace/{{$id}}"><img src="../resources/img/<?php echo strtolower($image) ?>.jpg" alt=""></a>
        {{-- loop->index es una variable de blade  --}}
        <h2>Carrera {{$loop->index+1}}</h2>
        <p>{{$date->format('d/m/Y')}}</p>
        <p>{{$id}}</p>
    </div>
    @endforeach
@endif

<a href="{{url('/paginaPrincipal')}}">Pagina principal</a>
