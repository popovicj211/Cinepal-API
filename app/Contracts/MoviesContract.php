<?php


namespace App\Contracts;
use App\DTO\MoviesDTO;
use App\Http\Requests\MoviesRequest;
use App\Http\Requests\PaginateRequest;
use Illuminate\Http\Request;
interface MoviesContract
{
      public function getMovies(PaginateRequest $request): array;
      public function getNewMovies(): array ;
      public function getMoviesCategories(int $cat , int $id, PaginateRequest $request): array ;
      public function getMovie(int $id): MoviesDTO;
      public function addMovie(MoviesRequest $request);
      public function modifyMovie(Request $request , int $id , int $img);
      public function deleteMovie(int $id);
}
