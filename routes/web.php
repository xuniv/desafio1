<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Pelicula;
use App\Actor;
use App\Genero;

use Illuminate\Http\Request;
Route::get('/', function () {

	$peliculas = Pelicula::all()->random(5);

    $ultimas = Pelicula::all()->sortByDesc('created_at')->take(5);

	return view('contenido',['peliculas'=>$peliculas,'ultimas'=>$ultimas]);

})->name('principal');

Route::get('titulos',function(){

$titulos = Pelicula::paginate(5);
return view('titulos',['titulos'=>$titulos]);


});

Route::get('buscar',function(Request $r){

$titulo = $r->input('titulo');

$titulos = Pelicula::where('title', 'LIKE', "%{$titulo}%")->paginate(3);
return view('titulos',['titulos'=>$titulos]);


});
Route::get('/pelicula/actores/{id}',function($id){
	
	//$genero= Pelicula::find($id)->genero->name;
	
	

	$actores = Pelicula::find($id)->actores;
	
	return view('actores',['actores'=>$actores]);

});
Route::post('/test/{id?}',function(Request $r,$id){

echo $id;

});
Route::post('/agregar',function(Request $r){


$v = $r->validate([
'titulo'=>'required',
'rating' =>'required',
'premios' => 'required',
'fecha' => 'required',
'duracion' => 'required',
'genero' => 'required'
]);



if (!empty($r->input('id') ))
	$p = Pelicula::find($r->input('id'));
else
	$p = new Pelicula();

$p->title =$r->input('titulo');
$p->rating =$r->input('rating');
$p->awards=$r->input('premios');
$p->release_date = $r->input('fecha');
$p->length=$r->input('duracion');
$p->genre_id = $r->input('genero');
$p->clasificacion = '';
$p->save();



return redirect()->route('agregar')->with('status',$r->input('titulo'));
});



Route::get('/agregar/{id?}',function($id=''){

	$peliculas = Pelicula::find($id);


$generos = Genero::all();
return view('/agregar',["generos" =>$generos,"peliculas"=>$peliculas]);


})->name('agregar');


Route::get ('/borrar/{id}',function($id){

Pelicula::destroy($id);


return redirect()->route('principal');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
