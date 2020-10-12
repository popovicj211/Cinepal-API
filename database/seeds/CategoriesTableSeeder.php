<?php

use Illuminate\Database\Seeder;
use App\Models\Categories;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $categories = [
               [
                    'name' => 'Genre',
                    'subcategory_id' => null
               ],
                [
                    'name' => 'Tehnologies',
                    'subcategory_id' => null
                ],
                [
                    'name' => 'Action',
                    'subcategory_id' => 1
                ],
                [
                    'name' => 'Comedy',
                    'subcategory_id' => 1
                ],
                 [
                     'name' => 'Drama',
                     'subcategory_id' => 1
                 ],
                  [
                      'name' => 'Adventure',
                      'subcategory_id' => 1
                  ],
                 [
                     'name' => 'Sci-Fi',
                     'subcategory_id' => 1
                 ],
                 [
                     'name' => 'Fantasy',
                     'subcategory_id' => 1
                 ],
                  [
                      'name' => 'Thriler',
                      'subcategory_id' => 1
                  ],

                   [
                       'name' => 'Digital 2D',
                       'subcategory_id' => 2
                   ] ,
                   [
                       'name' => 'Digital 3D',
                       'subcategory_id' => 2
                   ],
                    [
                        'name' => 'MX4D 2D',
                        'subcategory_id' => 2
                    ],
                    [
                        'name' => 'MX4D 3D',
                        'subcategory_id' => 2
                    ]

        ];

           foreach ($categories as $cat){
               Categories::create($cat);
           }
    }
}
