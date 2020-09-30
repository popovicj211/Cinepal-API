<?php

use Illuminate\Database\Seeder;
use App\Models\Images;
class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
              [
                'link' => 'slider.jpg'
              ],
              [
                'link' => 'slider2.jpg'
              ],
               [
                 'link' => 'badboysforlife.jpg'
               ],
              [
                  'link' => 'blackwidow.jpg'
              ],
              [
                'link' => 'lighthouse.jpg'
              ],
              [
                'link' => 'thenewmutants.jpg'
              ],
              [
                'link' => 'topgun.jpg'
              ],
             [
                'link' => 'waspnetwork.jpg'
             ],
        ];

         foreach ($images as $image){
                 Images::create($image);
         }

    }
}
