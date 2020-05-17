<?php

namespace App\Http\Controllers;

use App\Contracts\CategoriesContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class CategoriesController extends ApiController
{

    public function __construct(CategoriesContract $service)
    {
        parent::__construct($service);
        $this->service = $service;
    }

    public function getAllCategories(int $id){
        $this->data['categories'] = $this->service->getAllCategories($id);
        try {
            $this->result['categories'] = $this->Ok($this->data['categories']);
        } catch (QueryException $e) {
            Log::error("Error, get movies:" . $e->getMessage());
            $this->result['categories'] = $this->ServerError("Error , categories are not got from server!");
        }catch (ModelNotFoundException $e){
            $this->result['categories'] = $this->NotFound("Movie not found");
        }

        return $this->result['categories'];
    }


}
