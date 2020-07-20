<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\SeatcheckerContract;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateRequest;
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

    public function index(PaginateRequest $request){
        try {
            $this->data['seatCheckersAll'] = $this->service->getSeatCheckers($request);
            $this->result['seatCheckersAll'] = $this->Ok($this->data['seatCheckersAll']);
        } catch (QueryException $e) {
            Log::error("Error, get all numbers of seat on checker:" . $e->getMessage());
            $this->result['seatCheckersAll'] = $this->ServerError("Error ,get all numbers of seat on checker can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['seatCheckersAll'] = $this->NotFound("Numbers of seat on checker not found");
        }
        return $this->result['seatCheckersAll'];
    }

    public function edit($id){
        try {
            $this->data['editSeatChecker'] = $this->service->getSeatChecker($id);
            $this->result['editSeatChecker'] = $this->Ok($this->data['editSeatChecker']);
        } catch (QueryException $e) {
            Log::error("Error, edit  number of seat on checker:" . $e->getMessage());
            $this->result['editSeatChecker'] = $this->ServerError("Error ,edit number of seat on checker can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['editSeatChecker'] = $this->NotFound("Numbers of seat on checker not found");
        }
        return $this->result['editSeatChecker'];
    }

    public function store(SeatcheckerRequest $request){
        try {
            $this->service->addSeatChecker($request);
            $this->result['addSeatChecker'] = $this->Created('Number of seat checker is successfully added');
        }catch (\Exception $e){
            Log::error("Error, add seat checker:" . $e->getMessage());
            $this->result['addSeatChecker']  = $this->ServerError("Error , number of seat checker can not added on server!");
        }
        return $this->result['addSeatChecker'];
    }

    public function update(SeatcheckerRequest $request , $id){
        try {
            $this->service->modifySeatChecker($request, $id);
            $this->result['modifySeatChecker'] = $this->NoContent();
        }catch (QueryException $e){
            Log::error("Error, number of seat checker is not modify:" . $e->getMessage());
            $this->result['modifySeatChecker']  = $this->ServerError("Error ,edit number of seat checker is not modify");
        }catch (ModelNotFoundException $e){
            $this->result['modifySeatChecker'] = $this->NotFound("Numbers of seat on checker not found");
        }
        return $this->result['modifySeatChecker'];
    }

    public function delete($id){
        try {
            $this->service->deleteSeaChecker($id);
            $this->result['deleteSeatChecker'] = $this->NoContent();
        } catch (QueryException $e) {
            Log::error("Error, number of seat checker can not deleted:" . $e->getMessage());
            $this->result['deleteSeatChecker'] = $this->ServerError("Error,number of seat checker can not deleted");
        }catch (ModelNotFoundException $e){
            $this->result['deleteSeatChecker'] = $this->NotFound("Numbers of seat on checker not found");
        }
        return $this->result['deleteSeatChecker'];
    }

}
