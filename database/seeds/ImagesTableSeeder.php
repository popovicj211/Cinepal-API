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
                'link' => 'slider_'.time().'.jpg'
              ],
              [
                'link' => 'slider2_'.time().'.jpg'
              ],
               [
                 'link' => 'badboysforlife_'.time().'.jpg'
               ],
              [
                  'link' => 'blackwidow_'.time().'.jpg'
              ],
              [
                'link' => 'lighthouse_'.time().'.jpg'
              ],
              [
                'link' => 'thenewmutants_'.time().'.jpg'
              ],
              [
                'link' => 'topgun_'.time().'.jpg'
              ],
             [
                'link' => 'waspnetwork_'.time().'.jpg'
             ],
        ];

         foreach ($images as $image){
                 Images::create($image);
         }

    }
}
