<?php


namespace App\Contracts;


use App\DTO\ReservationDTO;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\ReservationAdminRequest;
use App\Http\Requests\ReservationRequest;

interface ReservationContract
{
    public function getReservations(PaginateRequest $request);
    public function findReservation(int $id): ReservationDTO;
    public function addReservation( ReservationAdminRequest $request);
    public function addReservationUser(ReservationRequest $request);
    public function modifyReservation( ReservationAdminRequest $request ,int $id);
    public function deleteReservation(int $id);

}
