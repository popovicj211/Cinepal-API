<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\PricelistContract;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PricelistRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PricelistController extends ApiController
{

    public function __construct(PricelistContract $service)
    {
        parent::__construct($service);
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $this->data['getPrice'] = $this->service->getPrice();
            $this->result['getPrice'] = $this->Ok($this->data['getPrice']);
        } catch (QueryException $e) {
            Log::error("Error, get price:" . $e->getMessage());
            $this->result['getPrice'] = $this->ServerError("Error , price are not get from server");
        }catch (ModelNotFoundException $e){
            $this->result['getPrice'] = $this->NotFound("Price not found");
        }

        return $this->result['getPrice'];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PricelistRequest $request)
    {
        try {
            $this->service->addPrice($request);
            $this->result['addPrice'] = $this->Created('Price is successfully added');
        }catch (QueryException $e){
            Log::error("Error, add price:" . $e->getMessage());
            $this->result['addPrice']  = $this->ServerError("Error ,price can't added on server!");
        }
        return $this->result['addPrice'];
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
            $this->data['showPrice'] = $this->service->findPrice($id);
            $this->result['showPrice'] = $this->Ok($this->data['showPrice']);
        } catch (QueryException $e) {
            Log::error("Error, show price:" . $e->getMessage());
            $this->result['showPrice'] = $this->ServerError("Error, data for show price can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['showPrice'] = $this->NotFound("Price not found");
        }

        return $this->result['showPrice'];
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
            $this->data['editPrice'] = $this->service->findPrice($id);
            $this->result['editPrice'] = $this->Ok($this->data['editPrice']);
        } catch (QueryException $e) {
            Log::error("Error, edit price:" . $e->getMessage());
            $this->result['editPrice'] = $this->ServerError("Error, data for edit price can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['editPrice'] = $this->NotFound("Price not found");
        }

        return $this->result['editPrice'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PricelistRequest $request, $id)
    {
        try {
            $this->service->modifyPrice($request, $id);
            $this->result['modifyPrice'] = $this->NoContent();
        }catch (QueryException $e){
            Log::error("Error, price is not modify:" . $e->getMessage());
            $this->result['modifyPrice']  = $this->ServerError("Error ,price is not modify");
        }catch (ModelNotFoundException $e){
            $this->result['modifyPrice'] = $this->NotFound("Price not found");
        }
        return $this->result['modifyPrice'];
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
            $this->service->deletePrice($id);
            $this->result['deletePrice'] = $this->NoContent();
        } catch (QueryException $e) {
            Log::error("Error, price can't deleted:" . $e->getMessage());
            $this->result['deletePrice'] = $this->ServerError("Error, price can't deleted");
        }catch (ModelNotFoundException $e){
            $this->result['deletePrice'] = $this->NotFound("Price not found");
        }
        return $this->result['deletePrice'];
    }
}
