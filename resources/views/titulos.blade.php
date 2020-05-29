@extends('layouts.principal')

@section('contenido')

<div class="container-fluid">
	<div class="row justify-content-md-center">
		<div class="col-md-6">
<form method="get" action="buscar">
	
	  <div class="input-group">
    <input type="text" name="titulo" class="form-control" placeholder="Buscar titulo">
    <div class="input-group-append">
      <button class="btn btn-secondary" type="submit">
      Buscar
      </button>
    </div>
  </div>
</form>

</div>
</div>
<div class="row justify-content-md-center">
	<div class="col-md-6">
		 @foreach ($titulos as $titulo)
   <a href="#" class="list-group-item list-group-item-action">
   	{{$titulo->title}} Genero: @if ($titulo->genero)
   		{{$titulo->genero->name}}
   		@else
		Sin Genero   		
   	@endif
   </a>
 @endforeach
	</div>

	</div>
	<div class="row justify-content-md-center">
		{{$titulos->links()}}
	</div>
</div>
@endsection