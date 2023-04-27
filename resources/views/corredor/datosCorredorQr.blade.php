@extends('layouts.layout')

@section('content')
    <div class="container air">
        <div class="card qr">
            @foreach ($runners as $runner)
                <div class="card-body">
                    <h1 class="card-title" style="font-size: 100px">{{$runner->dorsal}}</h1>
                    <h2 class="card-text">{{$runner->name . " " .$runner->last_name}}</h2>
                    <h3 class="card-text">{{$runner->title}}</h3>
                </div>
            @endforeach
        </div>
    </div>
@endsection