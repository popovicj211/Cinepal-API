<?php


namespace App\Services;


use App\Contracts\PricelistContract;
use App\DTO\PricelistDTO;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\PricelistRequest;
use App\Models\Categories;
use App\Models\Movies;
use App\Models\Pricelists;
use Carbon\Carbon;


class PricelistService extends BaseService implements PricelistContract
 {


         public function getPrice(): array
         {

            $prices = Movies::with('pricelist_categories')->get();
             $priceArr = [];

             foreach($prices as $price){
               $priceMC = $price->pricelist_categories;

                 foreach($priceMC as $p){
                     $priceDTO = new PricelistDTO();
                     $priceDTO->movie = $price->name;
                     $priceDTO->id = $p->pivot->id;
                     $priceDTO->cat = $p->name;
                     $priceDTO->price = $p->pivot->price;
                    $priceArr[] = $priceDTO;
                 }

             }

             return $priceArr;
         }

         public function findPrice(int $id): array
         {
             $priceArr = [];
          //   $prices = Movies::with('pricelist_categories')->get();
             $price = Movies::findOrFail($id);

          //   if($price != null) {
              //   foreach ($price->pricelist_categories as $p) {
                //     $priceDTO = new PricelistDTO();
                 //    $priceDTO->movie = $price->name;
              //       $priceDTO->id = $p->pivot->id;
               //      $priceDTO->cat = $p->name;
             //        $priceDTO->price = $p->pivot->price;
                  //   $priceArr[] = $priceDTO;
                   //  return $priceDTO;
             //    }

          //   }

             foreach ($price->pricelist_categories as $p) {
                 $priceDTO = new PricelistDTO();
                 $priceDTO->movie = $price->name;
                 $priceDTO->id = $p->pivot->id;
                      $priceDTO->cat = $p->name;
                         $priceDTO->price = $p->pivot->price;
                 $priceArr[] = $priceDTO;
             }


             return $priceArr;
         }



         public function addPrice(PricelistRequest $request)
         {
             $movie = $request->get('movieId');
             $cat = $request->get('catId');
             $price = $request->get('price');


             $pricelist = Pricelists::create([
                 'movie_id' => $movie,
                 'cat_id' => $cat,
                  'price' => $price,
                 'created_at' => Carbon::now()->toDateTime()
             ]);

             $pricelist->save();

         }

         public function modifyPrice(PricelistRequest $request, int $id)
         {
             $movie = $request->get('movieId');
             $cat = $request->get('catId');
             $price = $request->get('price');
             $pricelist =  Pricelists::findOrFail($id);

             $pricelist->update([
                 'movie_id' => $movie,
                 'cat_id' => $cat,
                 'price' => $price,
                 'updated_at' => Carbon::now()->toDateTime()
             ]);
         }

         public function deletePrice(int $id)
         {
             $pricelist = Pricelists::findOrFail($id);

             if ($pricelist != null ) {
                 $pricelist->delete();
             }
         }

}
