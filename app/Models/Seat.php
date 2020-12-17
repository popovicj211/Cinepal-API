<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $table = 'seat';
    protected $fillable = [
        'number', 'free'
    ];

   /* public function Reservation(){
        return $this->belongsTo(Reservation::class);
    }*/

    public function  reservation(){
        return $this->belongsToMany(Reservation::class , 'reservation_seat' , 'seat_id' , 'res_id');
    }

}
