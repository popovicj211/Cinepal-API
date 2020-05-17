<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricelists extends Model
{
    protected $table = 'pricelist';

    protected $fillable = [
        'cat_id' ,  'price'
    ];

    public function  categories(){
         return $this->belongsTo(Categories::class , 'cat_id' , 'id' , 'pricelists');
    }
/*
    public function  reservation(){
        return $this->hasOne(Placeseat::class);
    }
*/
}
