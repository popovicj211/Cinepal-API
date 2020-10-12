<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SeatChecker extends  Model
{
    protected $table = "seatchecker";
    protected $fillable = [
        'seat' , 'free'
    ];
}
