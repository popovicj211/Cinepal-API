<?php


namespace App\Services;


use App\Contracts\ReservationContract;
use App\DTO\ReservationDTO;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Models\Seat;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReservationService extends BaseService implements ReservationContract
{
    public function __construct($rimg = null)
    {
        parent::__construct($rimg);
    }

    public function getReservations(PaginateRequest $request): array
    {
        $page = $request->get('page');
        $perPage = $request->get('perPage');
        $reservation = Reservation::with( ['users','movies']);
        $resPag  = $this->generatePagedResponse($reservation, $perPage , $page);
        $resArr = [];
          foreach($resPag as $res){
               $resDTO = new ReservationDTO();
               $resDTO->id = $res->id;
               $resDTO->user = $res->users->email;
               $resDTO->movie = $res->movies->name;
               $resDTO->quantity = $res->qtypersons;
               $resDTO->total = $res->totalprice;
               $resDTO->dateFrom = $res->datefrom;
               $resDTO->dateTo = $res->dateto;
              $resDTO->number = $res->seat->number;
              $resArr[] = $resDTO;
          }
        return $resArr;
    }

    public function findReservation(int $id): ReservationDTO
    {
        $res = Reservation::with( ['users','movies' , 'seat'])->findOrFail($id);
        $resDTO = new ReservationDTO();
        $resDTO->id = $res->id;
        $resDTO->user = $res->users->email;
        $resDTO->movie = $res->movies->name;
        $resDTO->quantity = $res->qtypersons;
        $resDTO->total = $res->totalprice;
        $resDTO->dateFrom = $res->datefrom;
        $resDTO->dateTo = $res->dateto;
        $resDTO->number = $res->seat->number;
        return $resDTO;
    }

    public function addReservation(ReservationRequest $request)
    {
           $userId = $request->get('userId');
           $movieId = $request->get('movieId');
           $qty = $request->get('qty');
           $total = $request->get('total');
           $dateFrom = $request->get('datefrom');
           $dateTo = $request->get('dateto');
        $number = $request->get('number');
        $resAdd = Reservation::create([
            'user_id' => $userId,
             'movie_id' => $movieId,
             'qtypersons' => $qty,
             'totalprice' => $total,
              'datefrom' => $dateFrom,
              'dateto' => $dateTo,
             'created_at' => Carbon::now()->toDateTime()
        ]);

        $resAdd->save();


      /*  $seat = Seat::create([
            'number' => $number,
            're_id' =>  DB::getPdo()->lastInsertId(),
            'created_at' => Carbon::now()->toDateTime()
        ]);

        $seat->save();*/

        $resAddArr = [];

        foreach ($number as $res) {
            $arr = [
                'number'  => $res,
                're_id' => $resAdd->id ,
                'created_at' => Carbon::now()->toDateTime()
            ];
            $resAddArr[] = $arr;
        }

        Seat::insert($resAddArr);

    }

    public function modifyReservation(ReservationRequest $request ,int $id)
    {
        $userId = $request->get('userId');
        $movieId = $request->get('movieId');
        $qty = $request->get('qty');
        $total = $request->get('total');
        $dateFrom = $request->get('datefrom');
        $dateTo = $request->get('dateto');
        $number = $request->get('number');
        $res = Reservation::where('movie_id' , $id);
        $res->update([
            'user_id' => $userId,
            'movie_id' => $movieId,
            'qtypersons' => $qty,
            'totalprice' => $total,
            'datefrom' => $dateFrom,
            'dateto' => $dateTo,
            'updated_at' => Carbon::now()->toDateTime()
        ]);

      /*  $seat = Seat::where('re_id' , $id);
        $seat->update([
            'number' => $number,
            'updated_at' => Carbon::now()->toDateTime()
        ]);*/

        $resUpArr = [];

        foreach ($number as $res) {
            $arr = [
                'number'  => $res,
                're_id' =>  $id,
                'updated_at' => Carbon::now()->toDateTime()
            ];
            $resUpArr[] = $arr;
        }
        Seat::findOrFail($id)->update($resUpArr);

    }

    public function deleteReservation(int $id)
    {
        $res = Reservation::findOrFail($id);
        if ($res != null ) {
            $res->delete();
        }
    }

}

