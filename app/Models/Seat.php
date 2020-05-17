<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{

    protected $fillable = [
        'number', 'res_id'
    ];

    public function Reservation(){
        return $this->belongsTo(Reservation::class);
    }

}
