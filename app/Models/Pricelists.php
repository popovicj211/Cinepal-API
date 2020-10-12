<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricelists extends Model
{
    protected $table = 'pricelist';

    protected $fillable = [
        'movie_id', 'cat_id' ,'price'
    ];

    public function  pricecat(){
        return $this->belongsTo(Categories::class );
    }

    public function pricemovies(){
        return $this->belongsTo(Movies::class );
    }

}
