<?php

use Illuminate\Database\Seeder;
use App\Models\SeatChecker;
class SeatcheckerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SeatChecker::class , 10)->create();
    }
}
