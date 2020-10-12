<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $roles = ["Admin" , "User"];

          for ($i = 0; $i < count($roles); $i++){
                Role::create([
                      'name' => $roles[$i]
                ]);
          }
       // factory(App\Models\Role::class , 2)->create();

    }
}
