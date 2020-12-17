<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reservation extends  Model
{
    protected  $table = 'reservation';
    protected $fillable = [
        'user_id', 'movie_id' , 'qtypersons' , 'totalprice' , 'datefrom' , 'dateto'
    ];

  /*  public function users(){
          return $this->belongsTo(User::class );
    }


    public function movies(){
        return $this->belongsTo(Movies::class);
    }*/



 /*   public function seat(){
        return $this->belongsToMany(Seat::class);
    }*/

    public function seat(){
        return $this->belongsToMany(Seat::class , 'reservation_seat' , 'res_id' , 'seat_id');
    }

    public function movies(){
        return $this->belongsTo(Movies::class );
    }

    public function users(){
        return $this->belongsTo(User::class );
    }

}
