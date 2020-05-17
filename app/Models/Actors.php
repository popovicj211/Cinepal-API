<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Actors extends  Model
{
    protected $fillable = [
        'name'
    ];


    public function  movies(){
        return $this->belongsToMany(Movies::class , 'movies_actors' , 'actor_id' , 'movie_id');
    }


}
