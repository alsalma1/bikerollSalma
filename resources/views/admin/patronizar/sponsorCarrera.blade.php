<style>
    .sponsors{
        width: 70%;
        border: 1px solid black;
        margin:auto;
        display: grid;
        grid-template-columns: 20% , 20% , 20%; 
        padding: 40px;
    }
    .sponsors div{
        border: 1px solid black;
        width: max-content;
    }
</style>
<h1>Sponsors disponibles</h1>
<div class='sponsors'>
    @foreach ($sponsors as $sponsor)
    <?php
    $logo=preg_replace('([^A-Za-z0-9 ])', '', $sponsor['logo']);
    ?>
    <div>
        <h2>{{$sponsor['name']}}</h2>
        <img src="../resources/img/<?php echo strtolower($logo) ?>.jpg" alt="">
        <form action="" method="post">
            <select name="raceid" id="raceid">
                @foreach($races as $race)
                    <option value="{{$race['id']}}">{{$race['title']}}</option>
                @endforeach
            </select>
        </form>
    </div>
@endforeach
</div>