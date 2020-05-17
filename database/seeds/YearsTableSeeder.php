<?php

use Illuminate\Database\Seeder;
use App\Models\Year;
class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $years = [2020, 2019, 2018, 2017, 2016];
         foreach ($years as $year){
             Year::create([
                 'year' => $year
             ]);
         }
    }
}
