<?php

namespace App\Http\Controllers;

use App\Contracts\ActorsContract;
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

    public function getAllActors(PaginateRequest $request){
        $this->data['actors'] = $this->service->getActors($request);
        try {
            $this->result['actors'] = $this->Ok($this->data['actors']);
        } catch (QueryException $e) {
            Log::error("Error, get actors:" . $e->getMessage());
            $this->result['actors'] = $this->ServerError("Error , actors are not got from server!");
        }catch (ModelNotFoundException $e){
            $this->result['actors'] = $this->NotFound("Actors not found");
        }

        return $this->result['actors'];
    }

}
