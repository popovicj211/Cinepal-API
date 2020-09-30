<?php

namespace App\Http\Controllers;

use App\Contracts\SeatcheckerContract;
use App\Http\Requests\SeatcheckerRequest;
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

    public function updateSeatCheckersFree( Request $request , $free ){

        try {
            $this->service->modifySeatCheckerFree($request, $free);
            $this->result['modifySeatChecker'] = $this->NoContent();
           /*  $this->data['modifySeatChecker'] =  $this->service->modifySeatCheckerFree($request, $free);
            $this->result['modifySeatChecker'] = $this->Ok($this->data['modifySeatChecker']);*/
        }catch (QueryException $e){
            Log::error("Error, number of seat checker is not modify:" . $e->getMessage());
            $this->result['modifySeatChecker']  = $this->ServerError("Error ,edit number of seat checker is not modify");
        }catch (ModelNotFoundException $e){
            $this->result['modifySeatChecker'] = $this->NotFound("Numbers of seat on checker not found");
        }
        return $this->result['modifySeatChecker'];

    }


}
