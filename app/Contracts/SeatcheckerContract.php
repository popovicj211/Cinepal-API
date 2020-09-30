<?php


namespace App\Contracts;

use App\DTO\SeatcheckerDTO;
use App\Http\Requests\SeatcheckerRequest;
use App\Http\Requests\PaginateRequest;
use Illuminate\Http\Request;

interface SeatcheckerContract
{
    public function getSeatCheckers(PaginateRequest $request): array;
    public function getSeatCheckerFree(bool $free): array;
    public function getSeatChecker(int $id):SeatcheckerDTO;
    public function addSeatChecker(SeatcheckerRequest $request);
    public function modifySeatChecker(SeatcheckerRequest $request, int $id);
    public function modifySeatCheckerFree(Request $request, int $free);
    public function deleteSeaChecker(int $id);
}
