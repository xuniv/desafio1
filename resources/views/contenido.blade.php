@extends('layouts.principal')

@section('contenido')

	<div class="container-fluid">
		<div class="row justify-content-md-center">
			<h1>Random</h1>
		</div>
		<div class="row justify-content-md-center">
			
			@foreach ($peliculas as $pelicula)
			
				<div class="col-md-2">
					<div class="card" >
					  {{-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> --}}
					  <div class="card-body">
					    <h4 class="card-title">{{$pelicula->title}}</h4>
					    <p class="card-text">Rating {{$pelicula->rating}}</p>
					    <div class="card-footer">
					    
					    <a href="/pelicula/actores/{{$pelicula->id}}" class="btn-block btn-sm btn btn-primary">Ver actores</a>
					        <a href="/agregar/{{$pelicula->id}}" class="btn-block  btn-sm  btn btn-primary">Editar</a>
					          <a href="/borrar/{{$pelicula->id}}" class="btn-block btn-sm  btn btn-primary">Borrar</a>
					    
					    </div>
					  </div>
					</div>
				</div>
				
				

			@endforeach
			
		</div>
		<br>
		<div class="row justify-content-md-center">
			<h1>Ultimas</h1>
		</div>
		<div class="row justify-content-md-center">
			
			@foreach ($ultimas as $ultima)
				<div class="col-md-2">
					<div class="card" >
					  {{-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> --}}
					  <div class="card-body">
					    <h4 class="card-title">{{$ultima->title}}</h4>
					    <p class="card-text">Rating {{$ultima->rating}}</p>
					   
					  </div>
					      <div class="card-footer">
					    
					    <a href="/pelicula/actores/{{$pelicula->id}}" class="btn-block btn-sm btn btn-primary">Ver actores</a>
					        <a href="/agregar/{{$pelicula->id}}" class="btn-block  btn-sm  btn btn-primary">Editar</a>
					          <a href="/borrar/{{$pelicula->id}}" class="btn-block btn-sm  btn btn-primary">Borrar</a>
					    
					    </div>
					</div>
				</div>
				
				

			@endforeach
			
			
		</div>
		<div class="row justify-content-md-center">
			<a class="btn btn-primary" href="agregar" role="button">Agregar pelicula</a>
		</div>

	</div>

@endsection