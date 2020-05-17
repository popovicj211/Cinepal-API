<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SeatChecker extends  Model
{
    protected $fillable = [
        'seat' , 'free'
    ];
}
