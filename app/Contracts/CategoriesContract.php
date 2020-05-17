<?php


namespace App\Contracts;
use App\DTO\CategoriesDTO;
use App\Http\Requests\CategoriesRequest;

interface CategoriesContract
{
      public function getAllCategories(int $id): array;
      public function getCategory(int $cat ,int $id): CategoriesDTO;
      public function addCategory(CategoriesRequest $request);
      public function  modifyCategory(CategoriesRequest $request , $id);
      public function deleteCategory(int $id);

}
