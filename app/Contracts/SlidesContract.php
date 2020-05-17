<?php


namespace App\Contracts;
use App\DTO\SlidesDTO;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\SlidesRequest;
use Illuminate\Http\Request;
interface SlidesContract
{
            public  function getSlides(): array ;
            public function findSlide(int $id): SlidesDTO;
            public function  addSlide(SlidesRequest $request);
            public  function modifySlide(Request $request, int $id );
            public function deleteSlide(int $id);
}
