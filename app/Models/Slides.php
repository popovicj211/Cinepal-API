<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Slides extends  Model
{

    protected $fillable = [
        'header' , 'text' , 'img_id'
    ];

    public function img(){
           return $this->belongsTo(Images::class);
    }

}
