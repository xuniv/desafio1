@extends('layouts.principal')

@section('contenido')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>



@endif
@if (session('status'))
 <div class="alert alert-success">
 	<h1>Pelicula Guardada -  {{ session('status')}}</h1>
 	</div>
@endif

<div class="container-fluid">
		<div class="row justify-content-md-center">
			<div class="col-md-6">
				
				<form method="post" action="http://localhost:8000/agregar">
					
					{{ csrf_field() }}
					   
					   <input type="number" name="id" hidden value="{{ (($peliculas)?$peliculas->id:'')}}">

					   <div class="form-group">
					    <label for="Titulo">Titulo</label>
					  

					    <input type="text" name="titulo" class="form-control" id="Titulo" placeholder="rambo"
						value ="{{ (($peliculas)?$peliculas->title:'')}}"
					    >
					  </div>
					  <div class="form-group">
					    <label for="Rating">Rating</label>
					    <input type="number" name="rating" class="form-control" id="Rating" step="0.01" placeholder=""
						value ="{{ (($peliculas)?$peliculas->rating:'')}}"
					    >
					  </div>
					   <div class="form-group">
					    <label for="Premios">Premios</label>
					    <input type="number" name="premios" class="form-control" id="Premios"  placeholder="1"
						value ="{{ (($peliculas)?$peliculas->awards:'')}}"
					    >
					  </div>
					   <div class="form-group">
					    <label for="Fecha">Fecha extreno</label>
					    <input type="date" name="fecha" class="form-control" id="Fecha" placeholder=""
						value ={{ (($peliculas)?$peliculas->release_date:'')}}
					    >
					  </div>
					   <div class="form-group">
					    <label for="Duracion">Duración</label>
					    <input type="number" name="duracion" class="form-control" id="Duracion" step="0.01" placeholder=""
						value ="{{ (($peliculas)?$peliculas->length:'')}}"
					    >
					  </div>
					  <div class="form-group">
					  	 <label for="">Genero</label>
					   <select class="custom-select" name="genero" required>


					      <option value="">Elige el genero</option>
					    @foreach ($generos as $genero)
							<option  value="{{$genero->id}}"

							{{ (isset($peliculas) && ($peliculas->genre_id == $genero->id))?'selected':''}}

							> {{$genero->name}}</option>
					    @endforeach
					      
					    </select>
					  </div>
					  <div class="form-group">
					  	<button type="submit" class="btn btn-primary">Guardar pelicula</button>
					  </div>
					</form>
			</div>
	</div>
</div>
@endsection