<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Movies extends  Model
{

    protected $fillable = [
        'name' , 'description' , 'release_date' ,'running_time' , 'year_id', 'img_id'
    ];

    public function  year(){
        return $this->belongsTo(Year::class);
    }

    public function img(){
          return $this->belongsTo(Images::class);
    }

    public function category(){
         return $this->belongsToMany(Categories::class , 'movies_categories' , 'movie_id' , 'category_id' );
    }
    public function actors(){
        return $this->belongsToMany(Actors::class , 'movies_actors' , 'movie_id' , 'actor_id');
    }
    public function reservation(){
        return $this->hasOne(Reservation::class);
    }

    public function  pricelist(){
        return $this->hasMany( Pricelists::class, 'movie_id' , 'id');
    }


}
