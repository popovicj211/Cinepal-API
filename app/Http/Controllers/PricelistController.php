<?php

namespace App\Http\Controllers;

use App\Contracts\PricelistContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PricelistController extends ApiController
{
    public function __construct(PricelistContract $service)
    {
        parent::__construct($service);
        $this->service = $service;
    }

    public function getPricelist($id){
        try {
            $this->data['getSlides'] = $this->service->findPrice($id);
            $this->result['getSlides'] = $this->Ok($this->data['getPrice']);
        } catch (QueryException $e) {
            Log::error("Error, get slides:" . $e->getMessage());
            $this->result['getSlides'] = $this->ServerError("Error , slides are not get from server");
        }catch (ModelNotFoundException $e){
            $this->result['getSlides'] = $this->NotFound("Slides not found");
        }
        return $this->result['getSlides'];
    }

}
