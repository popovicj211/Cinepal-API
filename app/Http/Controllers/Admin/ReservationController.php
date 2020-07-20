<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ReservationContract;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends ApiController
{

    public function __construct(ReservationContract $service)
    {
        parent::__construct($service);
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
            $this->data['reservations'] = $this->service->getReservations($request);
            $this->result['reservations'] = $this->Ok($this->data['reservations']);
        } catch (QueryException $e) {
            Log::error("Error, get reservations:" . $e->getMessage());
            $this->result['reservations'] = $this->ServerError("Error ,reservations can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['reservations'] = $this->NotFound("Reservations not found");
        }
        return $this->result['reservations'];
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
    public function store(ReservationRequest $request)
    {
        try {
            $this->service->addReservation($request);
            $this->result['addReservation'] = $this->Created('Reservation is successfully added');
        }catch (\Exception $e){
            Log::error("Error, add reservation:" . $e->getMessage());
            $this->result['addReservation']  = $this->ServerError("Error , reservation can not added on server!");
        }
        return $this->result['addReservation'];
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
            $this->data['showReservation'] = $this->service->findReservation($id);
            $this->result['showReservation'] = $this->Ok($this->data['showReservation']);
        } catch (QueryException $e) {
            Log::error("Error, show reservation:". $e->getMessage());
            $this->result['showReservation'] = $this->ServerError("Error,show reservation can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['showReservation'] = $this->NotFound("Reservation not found");
        }

        return $this->result['showReservation'];
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
            $this->data['editReservation'] = $this->service->findReservation($id);
            $this->result['editReservation'] = $this->Ok($this->data['editReservation']);
        } catch (QueryException $e) {
            Log::error("Error, edit reservation:". $e->getMessage());
            $this->result['editReservation'] = $this->ServerError("Error,edit reservation can't get from server");
        }catch (ModelNotFoundException $e){
            $this->result['editReservation'] = $this->NotFound("Reservation not found");
        }

        return $this->result['editReservation'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationRequest $request, $id)
    {
        try {
            $this->service->modifyReservation($request, $id);
            $this->result['modifyReservation'] = $this->NoContent();
        }catch (QueryException $e){
            Log::error("Error, reservation is not modify:" . $e->getMessage());
            $this->result['modifyReservation']  = $this->ServerError("Error ,reservation is not modify");
        }catch (ModelNotFoundException $e){
            $this->result['modifyReservation'] = $this->NotFound("Reservation not found");
        }
        return $this->result['modifyReservation'];
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
            $this->service->deleteReservation($id);
            $this->result['deleteReservation'] = $this->NoContent();
        } catch (QueryException $e) {
            Log::error("Error, reservation can not deleted:" . $e->getMessage());
            $this->result['deleteReservation'] = $this->ServerError("Error, reservation can not deleted");
        }catch (ModelNotFoundException $e){
            $this->result['deleteReservation'] = $this->NotFound("Reservation not found");
        }
        return $this->result['deleteReservation'];
    }
}
