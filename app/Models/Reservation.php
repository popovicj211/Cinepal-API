<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reservation extends  Model
{
    protected  $table = 'reservation';
    protected $fillable = [
        'user_id', 'movie_id' , 'qtypersons' , 'totalprice' , 'datefrom' , 'dateto'
    ];

    public function user(){
          return $this->belongsTo(User::class);
    }

    public function movies(){
        return $this->belongsTo(Movies::class);
    }

    public function seat(){
        return $this->hasMany(Seat::class);
    }

}
