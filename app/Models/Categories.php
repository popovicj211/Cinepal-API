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

    public function pricelist(){
            return $this->hasMany( Pricelists::class, 'cat_id'  , 'id');
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
