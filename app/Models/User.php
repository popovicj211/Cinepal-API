<?php


namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
   use Notifiable;


    public function getJWTIdentifier()
   {
       return $this->getKey();
   }

   public function getJWTCustomClaims()
   {
       return [];
   }

    protected $table = "users";
    protected $fillable = [
        'name','username','email','email_verified_at', 'password' ,'role_id', 'email_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $hidden = [
        'password', 'email_token' ,'remember_token',
    ];

    public function role()
    {
            return $this->belongsTo(Role::class);
    }

    public function reservation(){
           return $this->hasOne(Reservation::class);
    }

}
