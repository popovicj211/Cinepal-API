<?php

namespace App\Http\Controllers;

use App\Contracts\MoviesContract;
use App\Http\Requests\PaginateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Exceptions\DataExcaption;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
class MoviesController extends ApiController
{

      public function __construct(MoviesContract $service)
      {
          parent::__construct($service);
          $this->service = $service;
      }

    public function getAllMovies(PaginateRequest $request)
    {


            try {
         $this->data['movies'] = $this->service->getMovies($request);
                $this->result['movies'] = $this->Ok($this->data['movies']);
            } catch (QueryException $e) {
                Log::error("Error, get movies:" . $e->getMessage());
                $this->result['movies'] = $this->ServerError("Error  movies can't get from server");
            }catch (ModelNotFoundException $e){
                $this->result['movies'] = $this->NotFound("Movies not found");
            }

        return $this->result['movies'];
    }

    public function getNewMovies()
    {

        $this->data['newMoviesNews'] = $this->service->getNewMovies();
        try {
            $this->result['newMoviesNews'] = $this->Ok($this->data['newMoviesNews']);
        } catch (QueryException $e) {
            Log::error("Error, new movies data:" . $e->getMessage());
            $this->result['newMoviesNews'] = $this->ServerError("Error , new movies can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['newMoviesNews'] = $this->NotFound("New movies not found");
        }

        return $this->result['newMoviesNews'];
    }


    public function getMoviesCategories($cat , $id , PaginateRequest $request)
    {
        try {
            $this->data['moviesCat'] = $this->service->getMoviesCategories( $cat , $id, $request);
            $this->result['moviesCat'] = $this->Ok($this->data['moviesCat']);
        } catch (QueryException $e) {
            Log::error("Error, filtering movies by category:" . $e->getMessage());
            $this->result['moviesCat'] = $this->ServerError("Error ,filtering movies by category data can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['moviesCat'] = $this->NotFound("Movie not found");
        }

        return $this->result['moviesCat'];
    }

    public function getMovie($id)
    {
        try {
            $this->data['movie'] = $this->service->getMovie( $id);
            $this->result['movie'] = $this->Ok($this->data['movie']);
        } catch (QueryException $e) {
            Log::error("Error, movie:" . $e->getMessage());
            $this->result['movie'] = $this->ServerError("Error ,movie can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['movie'] = $this->NotFound("Movie not found");
        }

        return $this->result['movie'];
    }


}
