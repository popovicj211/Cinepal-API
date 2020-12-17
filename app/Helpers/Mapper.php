<?php


namespace App\Helpers;


class Mapper
{

         static function maping( $movie , $value , $subid = null , $pivot = false){
              if($subid != null){
                  $categories = $movie->filter(function ($item) use ($subid) {
                      return $item->subcategory_id == $subid;
                  })->values()->all();
                  $collection = collect($categories);
              }else{
                  $collection = collect($movie);
              }
             if($pivot == true){
                 $mapingKeys = $collection->mapWithKeys(function ($item) use ($value) {
                     return  [$item['pivot']['id'] => $item['pivot'][$value]];
                 });
             }else{
                 $mapingKeys = $collection->mapWithKeys(function ($item) use ($value) {
                     return  [$item['id'] => $item[$value]];
                 });
             }


            return  $mapingKeysResult = $mapingKeys->all();
          }

}
