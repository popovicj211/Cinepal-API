<?php

namespace App\Http\Controllers;

use App\Contracts\ReservationContract;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\ReservationRequest;
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

    public function addReservation(ReservationRequest $request)
    {
        try {
            $this->service->addReservation($request);
            $this->result['addRes'] = $this->Created('Reservation is successfully added');
        }catch (\Exception $e){
            Log::error("Error, add reservation:" . $e->getMessage());
            $this->result['addRes']  = $this->ServerError("Error , reservation can not added on server!");
        }
        return $this->result['addRes'];
    }

}
