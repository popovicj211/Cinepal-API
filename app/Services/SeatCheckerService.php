<?php


namespace App\Services;


use App\Contracts\SeatcheckerContract;
use App\DTO\SeatcheckerDTO;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\SeatcheckerRequest;
use App\Models\SeatChecker;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class SeatCheckerService extends BaseService implements SeatcheckerContract
{
    private static $free = 0;

    public function __construct($rimg = null)
    {
        parent::__construct($rimg);
        $this->rimg = $rimg;
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
       /*    $seat = $request->get('seat');

        $seatAdd = SeatChecker::create([
            'seat' => $seat,
            'created_at' => Carbon::now()->toDateTime()
        ]);*/

        $seat = $request->get('seat');

        $arrSeat = [];
        foreach ($seat as $s) {
            $arr = [
                'seat' => $s ,
                'created_at' => Carbon::now()->toDateTime()
            ];
            $arrSeat[] = $arr;
        }
        $seatAdd = SeatChecker::create($arrSeat);

        $seatAdd->save();
    }

    public function modifySeatChecker(SeatcheckerRequest $request, int $id)
    {
        $seat = $request->get('seat');

        $arrSeat = [];
        foreach ($seat as $s) {
            $arr = [
                'id'  => $id,
                'seat' => $s ,
                'updated_at' => Carbon::now()->toDateTime()
            ];
            $arrSeat[] = $arr;
        }
        $seatUp = SeatChecker::findOrFail($id);
        $seatUp->update($arrSeat);
    }

    public function modifySeatCheckerFree(Request $request, int $free)
    {

       /* $request->validate([
            'seat' => 'required|array',
            'free' => 'required|number'
        ]);*/
        $seata = $request->get('seat');
       $freeSeat = $request->get('free');

        $seatUp = SeatChecker::query()->whereIn('seat' , $seata)->where('free' , $free);
        $seatUp->update(['free' => $freeSeat , 'updated_at' => Carbon::now()->toDateTime()]);
    /*   return [
             "seat" => $seata,
              "free" => $freeSeat
       ];*/
    }

    public function deleteSeaChecker(int $id)
    {
        $seat = SeatChecker::findOrFail($id);
        if ($seat != null ) {
            $seat->delete();
        }
    }

}
