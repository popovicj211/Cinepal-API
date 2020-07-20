<?php

namespace App\Http\Controllers;

use App\Contracts\SeatcheckerContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class SeatcheckerController extends ApiController
{
    public function __construct(SeatcheckerContract $service)
    {
        parent::__construct($service);
        $this->service = $service;
    }

     public function getSeatCheckersFree($free){
         try {
             $this->data['seatCheckerFree'] = $this->service->getSeatCheckerFree($free);
             $this->result['seatCheckerFree'] = $this->Ok($this->data['seatCheckerFree']);
         } catch (QueryException $e) {
             Log::error("Error, get free numbers of seat on checker:" . $e->getMessage());
             $this->result['seatCheckerFree'] = $this->ServerError("Error ,get free numbers of seat on checker can't get from server");
         }catch (ModelNotFoundException $e){
             $this->result['seatCheckerFree'] = $this->NotFound("Numbers of seat on checker not found");
         }
         return $this->result['seatCheckerFree'];
     }


}
