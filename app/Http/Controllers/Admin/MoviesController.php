<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\MoviesContract;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\MoviesRequest;
use App\Http\Requests\PaginateRequest;
use App\Services\MoviesService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MoviesController extends ApiController
{
    public function __construct( MoviesContract  $service)
    {
        parent::__construct( $service);
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaginateRequest $request)
    {
        try {
          $this->data['getMovies'] = $this->service->getMovies($request);
           $this->result['getMovies'] = $this->Ok($this->data['getMovies']);
        }catch (QueryException $e){
            Log::error("Error, get movies:" . $e->getMessage());
            $this->result['getMovies'] = $this->ServerError("Error,  movies can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['getMovies'] = $this->NotFound("Movie not found");
        }
        return $this->result['getMovies'];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MoviesRequest $request)
    {

        try {
            $this->service->addMovie($request);
             $this->result['addMovie'] = $this->Created('Movie is successfully added');
        }catch (\Exception $e){
             Log::error("Error, add movie:" . $e->getMessage());
              $this->result['addMovie']  = $this->ServerError("Error , movie can not added on server!");
        }
        return $this->result['addMovie'];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $this->data['showMovie'] = $this->service->getMovie($id);
            $this->result['showMovie'] = $this->Ok($this->data['showMovie']);
        } catch (QueryException $e) {
            Log::error("Error, show movie:" . $e->getMessage());
            $this->result['showMovie'] = $this->ServerError("Error, movie can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['showMovie'] = $this->NotFound("Movie not found");
        }

        return $this->result['showMovie'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        try {
            $this->data['editMovie'] = $this->service->getMovie($id);
            $this->result['editMovie'] = $this->Ok($this->data['editMovie']);
        } catch (QueryException $e) {
            Log::error("Error, edit movie:" . $e->getMessage());
            $this->result['editMovie'] = $this->ServerError("Error , data for edit movie can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['editMovie'] = $this->NotFound("Movie not found");
        }

        return $this->result['editMovie'];

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  int $img
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        try {
            $this->service->modifyMovie($request, $id);
            $this->result['modifyMovie'] = $this->NoContent();
        }catch (QueryException $e){
            Log::error("Error, movie is not modify:" . $e->getMessage());
            $this->result['modifyMovie']  = $this->ServerError("Error , movie is not modify");
        }catch (ModelNotFoundException $e){
            $this->result['modifyMovie'] = $this->NotFound("Movie not found");
        }
        return $this->result['modifyMovie'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param $img
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
             $this->service->deleteMovie($id);
            $this->result['deleteMovie'] = $this->NoContent();
        } catch (QueryException $e) {
            Log::error("Error, movie can not deleted:" . $e->getMessage());
            $this->result['deleteMovie'] = $this->ServerError("Error, movie can not deleted");
        }catch (ModelNotFoundException $e){
            $this->result['deleteMovie'] = $this->NotFound("Movie not found");
        }
        return $this->result['deleteMovie'];

    }



}
