<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MoviesCategories extends Model
{
    protected $table = 'movies_categories';
    protected $fillable = [
        'movie_id' , 'category_id'
    ];


}
