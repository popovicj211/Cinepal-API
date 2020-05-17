<?php

namespace App\Http\Controllers;

use App\Contracts\SlidesContract;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Exceptions\DataExcaption;
use Illuminate\Support\Facades\Log;
class SlidesController extends ApiController
{

           public function __construct( SlidesContract $service)
           {
               parent::__construct($service);
                $this->service = $service;
           }

           public function getAllSlides(){
               try {
                   $this->data['getSlides'] = $this->service->getSlides();
                   $this->result['getSlides'] = $this->Ok($this->data['getSlides']);
               } catch (QueryException $e) {
                   Log::error("Error, get slides:" . $e->getMessage());
                   $this->result['getSlides'] = $this->ServerError("Error , slides are not get from server");
               }catch (ModelNotFoundException $e){
                   $this->result['getSlides'] = $this->NotFound("Slides not found");
               }
               return $this->result['getSlides'];
           }

}
