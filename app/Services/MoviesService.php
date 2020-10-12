<?php


namespace App\Services;
use App\DTO\PricelistDTO;
use App\Helpers\Mapper;
use App\Http\Requests\MoviesRequest;
use App\Http\Requests\PaginateRequest;
use App\Models\Categories;
use App\Models\Images;
use App\Models\Movies;
use App\DTO\MoviesDTO;
use App\Contracts\MoviesContract;
use App\Models\MoviesActors;
use App\Models\MoviesCategories;
use App\Models\Pricelists;
use App\Models\Year;
use Carbon\Carbon;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Str;
use App\Helpers\ImageResize;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class MoviesService extends BaseService implements MoviesContract
{

    public function __construct(ImageResize $rimg)
    {
             parent::__construct($rimg);
             $this->rimg = $rimg;
    }

    public function getMovies(PaginateRequest $request): array
    {
        $page = $request->get('page');
        $perPage = $request->get('perPage');
        $movies = Movies::with( ['img' , 'year' , 'actors' , 'pricelist'] );
        $moviesPag  = $this->generatePagedResponse($movies, $perPage , $page );
        $catCount = DB::table('movies')->count();
        $moviesArr = [];
     //  $moviesArr[] = $moviesPag;
       foreach ($moviesPag['data'] as $movie)
        {
            $moviesDTO = new MoviesDTO();
        //1588291200

            $moviesDTO->id = $movie->id;
            $moviesDTO->name = $movie->name;
            $moviesDTO->desc = $movie->description;
         //  $moviesDTO->rel = date("d-M-Y", strtotime($movie->release_date));
          //  $moviesDTO->rel = Carbon::parse($movie->release_date)->timestamp;
            $moviesDTO->rel = Carbon::parse($movie->release_date)->toDateTimeString();
           //   $moviesDTO->rel = Carbon::parse(1585699200)->toDateString();
            $moviesDTO->runtime = $movie->running_time;
            $moviesDTO->img = $movie->img->link;
            $moviesDTO->year = $movie->year->year;
            $categories = Mapper::maping($movie->category, 'name' ,1 );
            $tehnologies = Mapper::maping($movie->category, 'name' ,2 );
            $actors = Mapper::maping($movie->actors , 'name');
            $moviesDTO->categories = $categories;
            $moviesDTO->tehnologies = $tehnologies;
            $moviesDTO->actors = $actors;
            $priceList = Mapper::maping($movie->pricelist , 'price');
            $moviesDTO->price = $priceList;

            $moviesArr[] = $moviesDTO;
        }

    //    return array('movies' =>  $moviesArr , 'count' => $moviesPag['count']);
        return array('data' =>  $moviesArr , 'count' => $catCount);
    }

    public function getNewMovies(): array
    {

      //  $monthNow = explode('-' , Carbon::parse(Carbon::now())->toDateTimeString());
          $dateTime = explode(' ' ,  Carbon::parse(Carbon::now())->toDateTimeString());
          $monthNow = explode('-' , Carbon::parse($dateTime[0])->toDateString());
       $date =   Carbon::parse($monthNow[0]."-".$monthNow[1]."-1 00:00:00")->toDateTime() ;
        $movies = Movies::with( ['img' , 'year' , 'actors', 'category' , 'pricelist' ] )->where('release_date' , '>=', $date)->orderBy('release_date' , 'desc')->offset(0)->limit(5)->get();

        $price = DB::table('pricelist as p')->select('p.id' , 'c.name' , 'p.price')->join('categories as c' , 'p.cat_id' , '=' , 'c.id')->get();

        $moviesNewArr = [];

       foreach ($movies as $movie)
        {
            $moviesDTO = new MoviesDTO();

            $moviesDTO->id = $movie->id;
            $moviesDTO->name = $movie->name;
            $moviesDTO->desc = $movie->description;
            $moviesDTO->rel = Carbon::parse($movie->release_date)->toDateTimeString();
            $moviesDTO->runtime = $movie->running_time;
            $moviesDTO->img = $movie->img->link;
            $moviesDTO->year = $movie->year->year;
            $categories = Mapper::maping($movie->category, 'name',1 );
            $tehnologies = Mapper::maping($movie->category, 'name',2 );
            $actors = Mapper::maping($movie->actors , 'name' );
            $moviesDTO->categories = $categories;
            $moviesDTO->tehnologies = $tehnologies;
            $moviesDTO->actors = $actors;
            $priceList = Mapper::maping($movie->pricelist , 'price');
            $moviesDTO->price = $priceList;
            $moviesNewArr[] = $moviesDTO;
        }

       return $moviesNewArr;

    }

    public function getMoviesCategories( $cat,  $id , PaginateRequest $request): array
    {
        $page = $request->get('page');
        $perPage = $request->get('perPage');

       $moviesCategories = Movies::with(['img' , 'year' , 'category' => function($query) use ($cat, $id) {
           $query->where([['categories.subcategory_id' , '=' , $cat],['categories.id' , '=' , $id]]);
        }, 'actors' , 'pricelist']);
        $moviesCatPag = $this->generatePagedResponse($moviesCategories, $perPage , $page );
         $catCount = DB::table('movies as m')->select('m.*' , 'c.subcategory_id')->join('movies_categories as mc' , 'm.id' , '=' , 'mc.movie_id')->join('categories as c' , 'mc.category_id' , '=' , 'c.id')->where('c.id','=' , $id)->count();
        $moviesCatArr = [];

            foreach ($moviesCatPag['data'] as $movie) {
                $moviesDTO = new MoviesDTO();

                $moviesDTO->id = $movie->id;
                $moviesDTO->name = $movie->name;
                $moviesDTO->desc = $movie->description;
                $moviesDTO->rel = Carbon::parse($movie->release_date)->toDateTimeString();
                $moviesDTO->runtime = $movie->running_time;
                $moviesDTO->img = $movie->img->link;
                $moviesDTO->year = $movie->year->year;
                $categories = Mapper::maping($movie->category, 'name' ,1 );
                $tehnologies = Mapper::maping($movie->category,'name',2 );
                $actors = Mapper::maping($movie->actors , 'name');
                $moviesDTO->categories = $categories;
                $moviesDTO->tehnologies = $tehnologies;
                $moviesDTO->actors = $actors;
                $priceList = Mapper::maping($movie->pricelist , 'price');
                $moviesDTO->price = $priceList;
                  if(count($movie->category) > 0) {
                      $moviesCatArr[] = $moviesDTO;
                  }
            }
        return array('data' =>  $moviesCatArr , 'count' => $catCount);
    }



    public function getMovie(int $id): MoviesDTO
    {

        $movie = Movies::with(['img' , 'year' , 'category' , 'actors' ,  'pricelist'])->findOrFail($id);

        $movieDTO = new MoviesDTO();
        $movieDTO->id = $movie->id;
        $movieDTO->name = $movie->name;
        $movieDTO->desc = $movie->description;
        $movieDTO->rel = Carbon::parse($movie->release_date)->toDateTimeString();
        $movieDTO->runtime = $movie->running_time;
        $movieDTO->img = $movie->img->link;
        $movieDTO->year = $movie->year->year;
       $categories = Mapper::maping($movie->category, 'name' ,1);
        $movieDTO->categories = $categories;
        $tehnologies = Mapper::maping($movie->category,'name',2 );
        $movieDTO->tehnologies = $tehnologies;
        $actors = Mapper::maping($movie->actors , 'name' );
        $movieDTO->actors = $actors;
        $priceList = Mapper::maping($movie->pricelist , 'price');
        $movieDTO->price = $priceList;
        return $movieDTO;
    }

    public function addMovie(MoviesRequest $request)
    {

        $hasFile = $request->hasFile('image');
        $file = $request->file('image');

        $this->rimg->setHasFile($hasFile);
        $this->rimg->setFile($file);

        $resizeImg = $this->rimg->resizeImg(250,350 );

        $name = $request->get('name');
        $desc = $request->get('desc');
        $rel = $request->get('rel');
        $runtime = $request->get('runtime');
        $year = $request->get('year');
        $categories = $request->get('category');
        $linkImg =  $resizeImg['link'];
        $actors = $request->get('actors');
        $price = $request->get('price');

 // var_dump($name.",".$desc.",".$rel.",".$runtime.",".$year.",".$categories.",".$linkImg.",".$actors);
             $images  = Images::create([
                      'link' => $linkImg,
                ]);
           $images->save();

            $movies = Movies::create([
                          'name' => $name,
                        'description' => $desc,
                       'release_date' => $rel,
                      'running_time' => $runtime,
                        'year_id' =>  $year,
                       'img_id' => DB::getPdo()->lastInsertId()
                ]);

            $movies->save();

          $catArr = [];

          foreach ($categories as $cat) {
              $arr = [
                  'movie_id'  => $movies->id,
                  'category_id' => $cat ,
                   'created_at' => Carbon::now()->toDateTime()
              ];
              $catArr[] = $arr;
          }

          MoviesCategories::insert($catArr);

        $actorsArr = [];

        foreach ($actors as $actor) {
            $arrA = [
                'movie_id'  => $movies->id,
                'actor_id' => $actor ,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ];
            $actorsArr[] = $arrA;
        }
        MoviesActors::insert($actorsArr);
    }

    public function modifyMovie(Request $request , $id )
    {

         $request->validate([
            'upImage' => 'nullable|file|mimes:jpg,jpeg,png|max:2000',
            'upName' => 'required|max:250',
            'upDesc' => 'required|max:2000',
            'upRel' => 'required|date|date_format:Y-m-d H:i:s',
            'upRuntime' => 'required|numeric',
            'upYear' => 'required|numeric',
            'upCategory' => 'required|array',
            'upActors' => 'required|array'
        ]);



        $hasFile = $request->hasFile('image');
        $file = $request->file('image');
        $name = $request->get('upName');
        $desc = $request->get('upDesc');
        $rel = $request->get('upRel');
        $runtime = $request->get('upRuntime');
        $year = $request->get('upYear');
        $categories = $request->get('upCategory');
        $actors = $request->get('upActors');
        $linkImg = null;

        if($hasFile){
            $this->rimg->setHasFile($hasFile);
            $this->rimg->setFile($file);
            $resizeImg = $this->rimg->resizeImg(250,350 );
            $linkImg =  $resizeImg['link'];

        }else{
            $defImage = Images::findOrFail($id);
            $linkImg  = $defImage->link;
        }

        $images = Images::findOrFail($id);
        $images->update([
            'link' => $linkImg,
             'updated_at' => Carbon::now()->toDateTime()
        ]);

        $movies = Movies::where('img_id' , $id);
        $movies->update([
            'name' => $name,
            'description' => $desc,
            'release_date' => $rel,
            'running_time' => $runtime,
            'year_id' => $year,
            'updated_at' => Carbon::now()->toDateTime()
        ]);

        $catArr = [];

        foreach ($categories as $cat) {
            $arr = [
                'movie_id'  => $id,
                'category_id' => $cat ,
                'updated_at' => Carbon::now()->toDateTime()
            ];
            $catArr[] = $arr;
        }
        MoviesCategories::findOrFail($id)->update($catArr);

        $actorsArr = [];

        foreach ($actors as $actor) {
            $arrA = [
                'movie_id'  => $id,
                'actor_id' => $actor ,
                'updated_at' => Carbon::now()->toDateTime()
            ];
            $actorsArr[] = $arrA;
        }
        MoviesActors::findOrFail($id)->update($actorsArr);


    }

    public function deleteMovie($id)
    {
        $image = Images::findOrFail($id);

        if ($image != null ) {
            $image->delete();
        }


    }

}
