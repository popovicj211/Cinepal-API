<?php


namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Images extends Model
{

    protected $fillable = [
        'link'
    ];

    public function movies(){
         return $this->hasOne(Movies::class);
    }

    public function slides(){
        return $this->hasOne(Slides::class);
    }

}
