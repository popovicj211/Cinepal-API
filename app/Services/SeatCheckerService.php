<?php


namespace App\Services;


use App\Contracts\SeatcheckerContract;
use App\DTO\SeatDTO;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\SeatcheckerRequest;
use App\Models\Seat;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class SeatCheckerService extends BaseService implements SeatcheckerContract
{
    private static $free = 0;


    public function getSeatCheckers(PaginateRequest $request): array
    {
        $page = $request->get('page');
        $perPage = $request->get('perPage');
        $seatch = Seat::query();
        $seatChPag  = $this->generatePagedResponse($seatch, $perPage , $page);
        $seatArr = [];
        foreach($seatChPag as $seat){
            $seatChDTO = new SeatDTO();
            $seatChDTO->id = $seat->id;
            $seatChDTO->number = $seat->number;
            $seatChDTO->free = $seat->free;

            $seatArr[] = $seatChDTO;
        }
        return $seatArr;
    }

    public function getSeatCheckerFree(bool $free): array
    {

        $seatch = Seat::where('free', $free)->get();
        $seatArr = [];
        foreach($seatch as $seat){
            $seatChDTO = new SeatDTO();
            $seatChDTO->id = $seat->id;
            $seatChDTO->number = $seat->number;
            $seatChDTO->free = $seat->free;

            $seatArr[] = $seatChDTO;
        }
        return $seatArr;
    }

    public function getSeatChecker(int $id): SeatDTO
    {
        $seat = Seat::findOrFail($id);
        $seatDTO = new SeatDTO();
        $seatDTO->id = $seat->id;
        $seatDTO->number = $seat->number;
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

        $seat = $request->get('number');
        $free = $request->get('free');

        $arrSeat = [];
        foreach ($seat as $s) {
            $arr = [
                'number' => $s ,
                 'free' => $free,
                'created_at' => Carbon::now()->toDateTime()
            ];
            $arrSeat[] = $arr;
        }
        $seatAdd = Seat::create($arr);

        $seatAdd->save();
    }

    public function modifySeatChecker(SeatcheckerRequest $request, int $id)
    {
        $seat = $request->get('number');
        $free = $request->get('free');

        $arrSeat = [];
        foreach ($seat as $s) {
            $arr = [
                'number' => $s ,
                'free' => $free,
                'updated_at' => Carbon::now()->toDateTime()
            ];
            $arrSeat[] = $arr;
        }
        $seatUp = Seat::findOrFail($id);
        $seatUp->update($arr);

    }

    public function modifySeatCheckerFree(Request $request, int $free)
    {

       /* $request->validate([
            'seat' => 'required|array',
            'free' => 'required|number'
        ]);*/
        $seata = $request->get('number');
       $freeSeat = $request->get('free');

        $seatUp = Seat::query()->whereIn('number' , $seata)->where('free' , $free);
        $seatUp->update(['free' => $freeSeat , 'updated_at' => Carbon::now()->toDateTime()]);

    }

    public function deleteSeaChecker(int $id)
    {
        $seat = Seat::findOrFail($id);
        if ($seat != null ) {
            $seat->delete();
        }
    }

}
