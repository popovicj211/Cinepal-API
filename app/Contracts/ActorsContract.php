<?php


namespace App\Contracts;
use App\DTO\ActorsDTO;
use App\Http\Requests\ActorsRequest;
use App\Http\Requests\PaginateRequest;
use Illuminate\Http\Request;
interface ActorsContract
{
     public function getActors(PaginateRequest $request): array ;
     public function findActor(int $id):ActorsDTO;
     public function addActor(ActorsRequest $request);
     public function modifyActor(ActorsRequest $request, int $id);
     public function deleteActor(int $id);
}
