<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ReservationSeat extends Model
{
    protected  $table = 'reservation_seat';
    protected $fillable = [
          'res_id' , 'seat_id'
    ];
}
