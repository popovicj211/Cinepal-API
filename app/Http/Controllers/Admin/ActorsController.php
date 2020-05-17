<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ActorsContract;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActorsRequest;
use App\Http\Requests\PaginateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ActorsController extends ApiController
{

    public function __construct(ActorsContract $service)
    {
        parent::__construct($service);
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param PaginateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(PaginateRequest $request)
    {
        try {
            $this->data['getActors'] = $this->service->getActors($request);
            $this->result['getActors'] = $this->Ok($this->data['getActors']);
        } catch (QueryException $e) {
            Log::error("Error, get actors:" . $e->getMessage());
            $this->result['getActors'] = $this->ServerError("Error , actors are not get from server");
        }catch (ModelNotFoundException $e){
            $this->result['getActors'] = $this->NotFound("Actors not found");
        }

        return $this->result['getActors'];
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
    public function store(ActorsRequest $request)
    {
        try {
            $this->service->addActor($request);
            $this->result['addActor'] = $this->Created('Actor is successfully added');
        }catch (QueryException $e){
            Log::error("Error, add actor:" . $e->getMessage());
            $this->result['addActor']  = $this->ServerError("Error ,actor can't added on server!");
        }
        return $this->result['addActor'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            $this->data['editActor'] = $this->service->findActor($id);
            $this->result['editActor'] = $this->Ok($this->data['editActor']);
        } catch (QueryException $e) {
            Log::error("Error, edit actor:" . $e->getMessage());
            $this->result['editActor'] = $this->ServerError("Error, data for edit actor can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['editActor'] = $this->NotFound("Actor not found");
        }

        return $this->result['editActor'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActorsRequest $request, $id)
    {
        try {
            $this->service->modifyActor($request, $id);
            $this->result['modifyActor'] = $this->NoContent();
        }catch (QueryException $e){
            Log::error("Error, actor is not modify:" . $e->getMessage());
            $this->result['modifyActor']  = $this->ServerError("Error ,actor is not modify");
        }catch (ModelNotFoundException $e){
            $this->result['modifyActor'] = $this->NotFound("Actor not found");
        }
        return $this->result['modifyActor'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->service->deleteActor($id);
            $this->result['deleteActor'] = $this->NoContent();
        } catch (QueryException $e) {
            Log::error("Error, actor can't deleted:" . $e->getMessage());
            $this->result['deleteActor'] = $this->ServerError("Error, actor can't deleted");
        }catch (ModelNotFoundException $e){
            $this->result['deleteActor'] = $this->NotFound("Actor not found");
        }
        return $this->result['deleteActor'];
    }
}
