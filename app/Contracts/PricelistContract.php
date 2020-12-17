<?php


namespace App\Contracts;


use App\DTO\PricelistDTO;
use App\Http\Requests\PricelistRequest;

interface PricelistContract
{
       public function getPrice():array;
       public function findPrice(int $id):array ;
       public function addPrice(PricelistRequest $request);
       public function modifyPrice(PricelistRequest $request , int $id);
       public function deletePrice(int $id);
}
