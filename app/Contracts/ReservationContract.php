<?php


namespace App\Contracts;


use App\DTO\ReservationDTO;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\ReservationRequest;

interface ReservationContract
{
    public function getReservations(PaginateRequest $request);
    public function findReservation(int $id): ReservationDTO;
    public function addReservation( ReservationRequest $request);
    public function modifyReservation( ReservationRequest $request ,int $id);
    public function deleteReservation(int $id);

}
