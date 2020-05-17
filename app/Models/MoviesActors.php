<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MoviesActors extends  Model
{
    protected $table = 'movies_actors';
    protected $fillable = [
        'movie_id' , 'actor_id'
    ];
}
