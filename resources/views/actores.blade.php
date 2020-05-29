@extends('layouts.principal')


@section('contenido')
<div class="container-fluid">
	<div class="row justify-content-md-center">
		<div class="col-md-6">
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
   Ac@tores
  </a>
 
 @foreach ($actores as $actor)
   <a href="#" class="list-group-item list-group-item-action">
   	{{$actor->first_name}} {{$actor->last_name}}
   </a>
 @endforeach
 
</div>
</div>
</div>
</div>
@endsection