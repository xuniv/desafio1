<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PeliculaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    

    public function toArray($request)
    {
        return parent::toArray([
            
            'id' => $this->id,
            'title' => $this->title,
            'rating' => $this->rating,
            'awards' => $this->awards,
            'release_date' =>(string)$this->release_date,
            'length' => $this->length,
            'genre_id' => $this->genre_id,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,



        ]);
    }
}
