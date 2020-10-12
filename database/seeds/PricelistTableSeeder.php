<?php

use Illuminate\Database\Seeder;
use App\Models\Pricelists;

class PricelistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pricelists::class , 10)->create();
    }
}
