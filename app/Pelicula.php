<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Actor;
class Pelicula extends Model
{
 
   public $table = 'movies';
   public $guarded =[];

   public function actores(){
   	return $this->belongsToMany(Actor::class,'actor_movie','movie_id','actor_id');
   }

   public function genero (){

   	return $this->belongsTo(Genero::class,'genre_id');
   }
}
