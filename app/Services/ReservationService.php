<?php


namespace App\Services;


use App\Contracts\ReservationContract;
use App\DTO\ReservationDTO;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\ReservationAdminRequest;
use App\Http\Requests\ReservationRequest;
use App\Models\Movies;
use App\Models\Reservation;
use App\Models\Seat;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReservationService extends BaseService implements ReservationContract
{
          private $userId;

    public function __construct($rimg = null)
    {
        parent::__construct($rimg);
        $this->rimg = $rimg;
    }

    public function getReservations(PaginateRequest $request): array
    {
        $page = $request->get('page');
        $perPage = $request->get('perPage');
       $reservation = Reservation::query()->leftJoin('seat as s' , 'reservation.id' , '=' , 's.id')->join('movies as m' , 'reservation.movie_id' , '=' , 'm.id')->join('users as u' , 'reservation.user_id' , '=' , 'u.id')->select('reservation.*' , 's.number','u.email' , 'm.name')->get();

        $catCount = DB::table('reservation')->count();
        $resArr = [];
          foreach($reservation as $res){
               $resDTO = new ReservationDTO();
               $resDTO->id = $res->id;
               $resDTO->email = $res->email;
               $resDTO->movie = $res->name;
               $resDTO->quantity = $res->qtypersons;
               $resDTO->total = $res->totalprice;
               $resDTO->dateFrom = $res->datefrom;
               $resDTO->dateTo = $res->dateto;
              $resDTO->number = $res->number;
              $resArr[] = $resDTO;
          }
   return array('data' =>  $resArr , 'count' => $catCount);

    }

    public function findReservation(int $id): ReservationDTO
    {
        $res = Reservation::query()->leftJoin('seat as s' , 'reservation.id' , '=' , 's.id')->join('movies as m' , 'reservation.movie_id' , '=' , 'm.id')->join('users as u' , 'reservation.user_id' , '=' , 'u.id')->select('reservation.*' , 's.number','u.email' , 'm.name')->where('reservation.id' , '=' , $id)->first();
        $resDTO = new ReservationDTO();
        $resDTO->id = $res->id;
        $resDTO->user = $res->email;
        $resDTO->movie = $res->name;
        $resDTO->quantity = $res->qtypersons;
        $resDTO->total = $res->totalprice;
        $resDTO->dateFrom = $res->datefrom;
        $resDTO->dateTo = $res->dateto;
        $resDTO->number = $res->number;
       return $resDTO;
    }

    public function addReservationUser(ReservationRequest $request)
    {

           $this->userId = auth()->id();
           $movieId = $request->get('movieId');
           $qty = $request->get('qty');
           $priceOfTehno = $request->get('priceOfTehno');

           $total = $priceOfTehno * $qty;

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

    public function addReservation(ReservationAdminRequest $request)
    {

        $this->userId = auth()->id();
        $movieId = $request->get('movieId');
        $qty = $request->get('qty');
        $total = $request->get('total');

        $dateFrom = $request->get('datefrom');
        $dateTo = $request->get('dateto');
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


    public function modifyReservation(ReservationAdminRequest $request ,int $id)
    {
     //   $userId = $request->get('userId');
        $this->userId = auth()->id();
        $movieId = $request->get('movieId');
        $qty = $request->get('qty');
        $total = $request->get('total');
        $dateFrom = $request->get('datefrom');
        $dateTo = $request->get('dateto');
        $number = $request->get('number');
        $res = Reservation::where('movie_id' , $id);
        $res->update([
            'user_id' => $this->userId,
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
      //  $res = Reservation::findOrFail($id);
        $res = Seat::with('seat')->where( 're_id' , $id);
        if ($res != null ) {
            $res->delete();
        }
    }

}

