<?php

use Illuminate\Database\Seeder;
use App\Models\MoviesActors;
class MoviesActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(MoviesActors::class , 24)->create();
    }
}
