<?php


namespace App\Services;


use App\Contracts\PricelistContract;
use App\DTO\PricelistDTO;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\PricelistRequest;
use App\Models\Categories;
use App\Models\Pricelists;
use Carbon\Carbon;


class PricelistService extends BaseService implements PricelistContract
 {
         public function __construct($rimg = null)
         {
             parent::__construct($rimg);
             $this->rimg = $rimg;
         }

         public function getPrice(): array
         {
             $prices = Pricelists::with('categories')->get();
             $priceArr = [];
             foreach ($prices as $price)
             {
                 $priceDTO = new PricelistDTO();
                 $priceDTO->id = $price->id;
                 $priceDTO->cat = $price->categories->name;
                 $priceDTO->price = $price->price;
                 $priceArr[] = $priceDTO;
             }

             return $priceArr;
         }

         public function findPrice(int $id): PricelistDTO
         {
             $price = Pricelists::with('categories')->findOrFail($id);
             if($price != null) {
                 $priceDTO = new PricelistDTO();
                 $priceDTO->id = $price->id;
                 $priceDTO->cat = $price->categories->name;
                 $priceDTO->price = $price->price;
                 return $priceDTO;
             }
         }

         public function addPrice(PricelistRequest $request)
         {
             $cat = $request->get('catId');
             $price = $request->get('price');


             $pricelist = Pricelists::create([
                 'cat_id' => $cat,
                  'price' => $price
             ]);

             $pricelist->save();

         }

         public function modifyPrice(PricelistRequest $request, int $id)
         {
             $cat = $request->get('catId');
             $price = $request->get('price');
             $pricelist =  Pricelists::findOrFail($id);

             $pricelist->update([
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
