
@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Editar Frase Principal</h1>
  <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Secciones<span></a>
</div>
  <div class="row justify-content-center">
    <div class="col-md-12 d-none d-sm-none d-md-none d-lg-block"><iframe id="ifra" src="/#frase"  width="100%" height="450"></iframe></div>
    <div class="col-md-12">
      <!-- LINE/SPACE -->
      @foreach($orders as $item)
        @if($item->id == 12)
      <form method="POST" action="{{route('line.update', 12)}}">
        @csrf
        <div class="line-space card col-md-8 offset-md-2 mt-4 mb-4">
          <a href="#" style="text-decoration: none">
            <div class="card-header py-3">
            <div class="row">
              <span class="col-md-6"><h6 class="m-0 font-weight-bold text-primary">Espacio entre:</h6></span>
                  @if($item->line == 0)
                    <select onchange="this.form.submit()" name="line-display-hidden" class="col-md-6  float-right">
                      <option selected>Nada</option>
                      <option value = "1">Línea</option>
                      <option value = "2">Margen</option>
                    </select>
                  @endif
            </div>
          </div>
          </a>
          @if($item->line != 0)
          <div id="collapse12">
            <div class="card-body row">
            <div class="col-md-6 offset-md-3">
              <div class="row">
                <div class="col-md-6">
                  <label for="line-display">Espacio:</label>
                  <select name="line-display" onchange="this.form.submit()">
                    <option value="0">No Mostrar</option>
                  @if($item->line == 1)
                    <option value="1" selected>Línea</option>
                    <option value="2">Margen</option>
                    @elseif($item->line == 2)
                    <option value="1">Línea</option>
                    <option value="2" selected>Margen</option>
                    @endif
                  </select>
                </div>
                <div class="col-md-6 {{$item->line == 2 ? 'd-none' : ''}}">

                    <label for="line-display">Estilo de Línea:</label>
                    <select name="line-style" onchange="this.form.submit()">
                      @if($item->line_style == 1)
                        <option value="1" selected>Parcial</option>
                        <option value="2">Completo</option>
                      @elseif($item->line_style == 2)
                        <option value="1">Parcial</option>
                        <option value="2" selected>Completo</option>
                      @endif
                    </select>

                </div>
              </div>
            </div>
          </div>
          </div>
          @endif
        </div>
      </form>
        @endif
      @endforeach
      <!-- END LINE/SPACE -->
    </div>
    <div class="card mt-3 col-md-8 mb-5">
        <div class="card-body">

              <div class="form-group d-none d-sm-block d-md-block d-lg-none">
                <img class="img-fluid px-3 px-sm-4" src="{{asset('img/sections/frase.png')}}">
              </div>
              <div class="form-group">
                <label for="title" class="col-form-label">Titulo</label>
                <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{ $frases[0]->title }}">
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <button id="ajButton" class="btn btn-success float-right">Actualizar</button>
              </div>


        </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>

 $("#ajButton").click(function(e){
    e.preventDefault();

    var title = $("#title").val();


    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'/frase/1',
           data:{"_token": "{{ csrf_token() }}",
           title:title
          },
           success:function(data){
              alert(data.success);
           }
        });
    document.getElementById('ifra').contentDocument.location.reload(true);
      });
</script>
@endsection
