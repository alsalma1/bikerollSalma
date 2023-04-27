@extends('layouts.layout')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="container air">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
                <h1 style="display:inline">Subir fotos de la carrera {{$carreras['title']}}</h1>
                <a href="{{url('/editarCarrera')}}" class="btn btn-primary float-right" style="margin-top: 10px;">Volver atrás</a>
        </div>
    </div>
  </div>
  <hr>

    <form action="{{$carreras['id']}}" method="POST" class="dropzone" id="myDropzone" enctype="multipart/form-data">
      @csrf
    </form>
    <div id="message" style="background-color:red;width:100% "></div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  Dropzone.options.myDropzone = {
    headers:{
      'C-CSRF-TOKEN' : "{{csrf_token()}}"
    },

    dictDefaultMessage: "Arrastra las imagenes aqui",
    acceptedFiles: ".jpg",
    maxFilesize: 2,

    init: function () {
      console.log("hola");
      this.on("complete", function (file) {
        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
          doSomething();
        }
      });
    }
  };

</script>
@endsection