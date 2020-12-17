<?php


namespace App\Services;


use App\Contracts\ReservationContract;
use App\DTO\ReservationDTO;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\ReservationAdminRequest;
use App\Http\Requests\ReservationRequest;
use App\Models\Movies;
use App\Models\Reservation;
use App\Models\ReservationSeat;
use App\Models\Seat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReservationService extends BaseService implements ReservationContract
{
          private $userId;
           private static $free = 1;
          private static $reserved = 0;



    public function queryRes($id){
       $resQuery = Reservation::query()->join('reservation_seat as rs' , 'reservation.id' , '=' , 'rs.res_id')->join('seat as s' , 'rs.seat_id' , '=' , 's.id')->where('reservation.id' , '=' , $id )->select( 's.number')->get();
       return $resQuery;
    }

    public function getReservations(PaginateRequest $request): array
    {

        $page = $request->get('page');
        $perPage = $request->get('perPage');
     //  $reservation = Reservation::query()->join('movies as m' , 'reservation.movie_id' , '=' , 'm.id')->join('users as u' , 'reservation.user_id' , '=' , 'u.id')->select('reservation.*' ,'u.email' , 'm.name')->get();
    //    $reservation = Reservation::with(['seat' , 'movies' , 'users'])->get();
      //$seat =
        $reservation = User::with( ['reservation_movies' , 'reservation' => function($query) {
        $query->with('seat')->get();
    }])->get();



        $catCount = DB::table('reservation')->count();
        $resArr = [];
     // $resArr[] = $reservation;

        $arrSeatNumbers = [];
          $free = null;
        foreach($reservation as $res){
            $resMU = $res->reservation_movies;
            $resR = $res->reservation;

           foreach($resR as $r){
                foreach ($r->seat as $key => $value){
                        //     $key++;

                    $arrSeatNumbers[] = ["id" => $value->id, "number" => $value->number , "free" => $value->free , 'res_id' => $value->pivot->res_id ];
                  //  $resArr[] = $arrSeatNumbers;
                }

            }



            foreach($resMU as $r){
                $resDTO = new ReservationDTO();
                $resDTO->id = $r->pivot->id;
                $resDTO->email = $res->email;
                $resDTO->movie = $r->name;
                $resDTO->quantity = $r->pivot->qtypersons;
                $resDTO->total = $r->pivot->totalprice;
                $resDTO->dateFrom = $r->pivot->datefrom;
                $resDTO->dateTo = $r->pivot->dateto;
                $resDTO->seat = $arrSeatNumbers;
             $resArr[] =  $resDTO;
            }

        }



   //return array('data' =>  $resArr , 'count' => $catCount);
        return  $resArr;
    }

    public function findReservation(int $id): ReservationDTO
    {
        $res = Reservation::query()->join('movies as m' , 'reservation.movie_id' , '=' , 'm.id')->join('users as u' , 'reservation.user_id' , '=' , 'u.id')->select('reservation.*' ,'u.email' , 'm.name')->where('reservation.id' , '=' , $id)->first();
        $resDTO = new ReservationDTO();
        $resDTO->id = $res->id;
        $resDTO->email = $res->email;
        $resDTO->movie = $res->name;
        $resDTO->quantity = $res->qtypersons;
        $resDTO->total = $res->totalprice;
        $resDTO->dateFrom = $res->datefrom;
        $resDTO->dateTo = $res->dateto;
      //  $resDTO->number = $res->number;
        $resDTO->number = $this->queryRes( $res->id);
       return $resDTO;
    }

    public function addReservationUser(ReservationRequest $request)
    {

           $this->userId = auth()->id();
           $movieId = $request->get('movieId');
           $qty = $request->get('qty');
           $priceOfTehno = $request->get('priceOfTehno');

           $total = floatval($priceOfTehno) * intval($qty);

           $dateFrom = Carbon::now()->toDateTime();
         //  $dateTo = $request->get('dateto');
          $movie = Movies::find($movieId);
          $dateTo = $movie->release_date;
           $number = $request->get('number');
            $resAdd = Reservation::create([
            'user_id' => $this->userId,
             'movie_id' => $movieId,
             'qtypersons' => $qty,
             'totalprice' => $total,
              'datefrom' => $dateFrom,
              'dateto' => $dateTo,
             'created_at' => Carbon::now()->toDateTime()
        ]);

        $resAdd->save();



        $resAddArr = [];
      //  $seatUpdArr = [];
        foreach($number as $res) {

            $arr = [
                'res_id'  => $resAdd->id,
                'seat_id' => $res ,
                'created_at' => Carbon::now()->toDateTime()
            ];

            $resAddArr[] = $arr;
        }

        $seatUp = Seat::query()->whereIn('number' , $number)->where('free' , self::$free);
        $seatUp->update(['free' => self::$reserved , 'updated_at' => Carbon::now()->toDateTime()]);

     /*   foreach ($number as $res) {
            $arrSeat = [
                'id'  => $res,
                'free' => self::$free ,
                'updated_at' => Carbon::now()->toDateTime()
            ];
            $seatUpdArr[] = $arrSeat;
        }*/

      /*  if(count($number) == 1){
            Seat::whereIn('id' , $number)->update($arrSeat);
        }else{
            Seat::whereIn('id' , $number)->update($seatUpdArr);
        }*/
        ReservationSeat::insert($resAddArr);

    }

    public function addReservation(ReservationAdminRequest $request)
    {

        $this->userId = $request->get('userId');
        $movieId = $request->get('movieId');
        $qty = $request->get('qty');
        $total = $request->get('total');

        $dateFrom = $request->get('datefrom');
        $dateTo = $request->get('dateto');
        $number = $request->get('numbId');
        $resAdd = Reservation::create([
            'user_id' => $this->userId,
            'movie_id' => $movieId,
            'qtypersons' => $qty,
            'totalprice' => $total,
            'datefrom' => $dateFrom,
            'dateto' => $dateTo,
            'created_at' => Carbon::now()->toDateTime()
        ]);

        $resAdd->save();



        $resAddArr = [];

        foreach ($number as $res) {
            $arr = [
                'res_id'  => $resAdd->id,
                'seat_id' =>  $res,
                'created_at' => Carbon::now()->toDateTime()
            ];
            $resAddArr[] = $arr;
        }

        ReservationSeat::insert($resAddArr);

    }


    public function modifyReservation(ReservationAdminRequest $request ,int $id)
    {
        $this->userId = $request->get('userId');
        $movieId = $request->get('movieId');
        $qty = $request->get('qty');
        $total = $request->get('total');
        $dateFrom = $request->get('datefrom');
        $dateTo = $request->get('dateto');
        $number = $request->get('numbId');
        $resUp = Reservation::findOrFail($id);
        $resUp->update([
            'user_id' => $this->userId,
            'movie_id' => $movieId,
            'qtypersons' => $qty,
            'totalprice' => $total,
            'datefrom' => $dateFrom,
            'dateto' => $dateTo,
            'updated_at' => Carbon::now()->toDateTime()
        ]);

        $resUpArr = [];

        foreach ($number as $res) {

            $arr = [
                'res_id'  => $id,
                'seat_id' =>  $res,
                'updated_at' => Carbon::now()->toDateTime()
            ];
            $resUpArr[] = $arr;
        }
      //  $upResSeat = ReservationSeat::where('res_id' , $id);
      /*  if($upResSeat != null ) {
            $upResSeat->update($resUpArr);
        }*/
             if(count($number) == 1){
                 ReservationSeat::where('res_id' , $id)->update($arr);
             }else{
                 ReservationSeat::where('res_id' , $id)->update($resUpArr);
             }


    }

    public function deleteReservation(int $id)
    {
      //  $res = Reservation::findOrFail($id);
        $res = Reservation::findOrFail($id);
        if ($res != null ) {
            $res->delete();
        }
    }

}

