<?php

namespace App\Http\Controllers;
use App\Pelicula;
use Illuminate\Http\Request;
use App\Http\Resources\PeliculaResource;

class Api extends Controller
{
    public function __construct()
   {
    $this->middleware('auth:api')->except(['index', 'show','destroy','store','update']);
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return PeliculaResource::collection(Pelicula::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        
        $v = $r->validate([
        'title'=>'required',
        'rating' =>'required',
        'awards' => 'required',
        'release_date' => 'required',
        'length' => 'required',
        'genre_id' => 'required'
        ]);


        
        $p = new Pelicula();

        $p->title =$r->input('title');
        $p->rating =$r->input('rating');
        $p->awards=$r->input('awards');
        $p->release_date = $r->input('release_date');
        $p->length=$r->input('length');
        $p->genre_id = $r->input('genre_id');
        $p->clasificacion = '';
        $p->save();


        return new PeliculaResource($p);
            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $p = Pelicula::find($id);
        if ($p)
            return new PeliculaResource($p);
        else
            return response()->json(["data"=>[]]);
  }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r,$pelicula)
    {
         $v = $r->validate([
       
        'title'=>'required',
        'rating' =>'required',
        'awards' => 'required',
        'release_date' => 'required',
        'length' => 'required',
        'genre_id' => 'required'
        ]);


        
        $p = Pelicula::find($pelicula);

        $p->title =$r->input('title');
        $p->rating =$r->input('rating');
        $p->awards=$r->input('awards');
        $p->release_date = $r->input('release_date');
        $p->length=$r->input('length');
        $p->genre_id = $r->input('genre_id');
        $p->clasificacion = '';
        $p->save();


        return new PeliculaResource($p);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Pelicula::destroy($id);
        return response()->json(null,204);
    }
}
