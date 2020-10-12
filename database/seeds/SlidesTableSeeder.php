<?php

use Illuminate\Database\Seeder;
use App\Models\Slides;
class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Slides::class , 2)->create();
    }
}
