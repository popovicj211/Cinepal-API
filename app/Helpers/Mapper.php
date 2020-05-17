<?php


namespace App\Helpers;


class Mapper
{

         static function maping( $movie , $subid = null ){
              if($subid != null){
                  $categories = $movie->filter(function ($item) use ($subid) {
                      return $item->subcategory_id == $subid;
                  })->values()->all();
                  $collection = collect($categories);
              }else{
                  $collection = collect($movie);
              }

              $mapingKeys = $collection->mapWithKeys(function ($item) {
                  return [$item['id'] => $item['name']];
              });

            return  $mapingKeysResult = $mapingKeys->all();
          }

}
