<?php


namespace App\Services;


use App\Contracts\SeatcheckerContract;
use App\DTO\SeatcheckerDTO;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\SeatcheckerRequest;
use App\Models\SeatChecker;
use Carbon\Carbon;

class SeatCheckerService extends BaseService implements SeatcheckerContract
{
    public function __construct($rimg = null)
    {
        parent::__construct($rimg);
    }

    public function getSeatCheckers(PaginateRequest $request): array
    {
        $page = $request->get('page');
        $perPage = $request->get('perPage');
        $seatch = SeatChecker::query();
        $seatChPag  = $this->generatePagedResponse($seatch, $perPage , $page);
        $seatArr = [];
        foreach($seatChPag as $seat){
            $seatChDTO = new SeatcheckerDTO();
            $seatChDTO->id = $seat->id;
            $seatChDTO->seat = $seat->seat;
            $seatChDTO->free = $seat->free;

            $seatArr[] = $seatChDTO;
        }
        return $seatArr;
    }

    public function getSeatCheckerFree(bool $free): array
    {

        $seatch = SeatChecker::where('free', $free)->get();
        $seatArr = [];
        foreach($seatch as $seat){
            $seatChDTO = new SeatcheckerDTO();
            $seatChDTO->id = $seat->id;
            $seatChDTO->seat = $seat->seat;
            $seatChDTO->free = $seat->free;

            $seatArr[] = $seatChDTO;
        }
        return $seatArr;
    }

    public function getSeatChecker(int $id): SeatcheckerDTO
    {
        $seat = SeatChecker::findOrFail($id);
        $seatDTO = new SeatcheckerDTO();
        $seatDTO->id = $seat->id;
        $seatDTO->seat = $seat->seat;
        $seatDTO->free = $seat->free;
        return $seatDTO;
    }

    public function addSeatChecker(SeatcheckerRequest $request)
    {
           $seat = $request->get('seat');
           $free = $request->get('free');

        $seatAdd = SeatChecker::create([
            'seat' => $seat,
            'free' => $free,
            'created_at' => Carbon::now()->toDateTime()
        ]);

        $seatAdd->save();
    }

    public function modifySeatChecker(SeatcheckerRequest $request, int $id)
    {
        $seat = $request->get('seat');
        $free = $request->get('free');
        $seatUp = SeatChecker::findOrFail($id);
        $seatUp->update([
            'seat' => $seat,
            'free' => $free,
            'updated_at' => Carbon::now()->toDateTime()
        ]);
    }

    public function deleteSeaChecker(int $id)
    {
        $seat = SeatChecker::findOrFail($id);
        if ($seat != null ) {
            $seat->delete();
        }
    }

}
