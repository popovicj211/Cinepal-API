<?php


namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

    protected $fillable = [
        'name' , 'subcategory_id'
    ];

    public function  movies(){
        return $this->belongsToMany(Movies::class ,   'movies_categories' , 'category_id' , 'movie_id' );
    }
/*
    public function pricelists(){
            return $this->belongsToMany( Movies::class ,'pricelist', 'cat_id'  , 'movie_id');
    }
*/

    public function pricelistMovies(){
        return $this->belongsToMany( Movies::class ,'pricelist', 'cat_id'  , 'movie_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'subcategory_id' , 'id' );
    }

    public function  subcategory()
    {
        return $this->hasMany(Categories::class, 'subcategory_id' , 'id');
    }


}
