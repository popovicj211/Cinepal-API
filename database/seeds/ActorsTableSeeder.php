<?php

use Illuminate\Database\Seeder;
use App\Models\Actors;
class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(Actors::class, 12)->create();
    }
}
