<?php


namespace App\Services;
use App\DTO\PricelistDTO;
use App\Helpers\ImageValidator;
use App\Helpers\Mapper;
use App\Helpers\ResponseData;
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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Helpers\ImageResize;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MoviesService extends BaseService implements MoviesContract
{
private $rimg;
private $valid;
private $arrayErrors = [];
private $imagePathStorage = "";


    public function __construct( ImageValidator $valid)
    {
        $this->valid = $valid;
    }

    public function getMovies(PaginateRequest $request): array
    {
        $page = $request->get('page');
        $perPage = $request->get('perPage');
        $movies = Movies::with( ['img' , 'year' , 'actors' , 'pricelist_categories'] );
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
            $priceList = Mapper::maping($movie->pricelist_categories , 'price' , null , true);
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
        $movies = Movies::with( ['img' , 'year' , 'actors', 'category' , 'pricelist_categories' ] )->where('release_date' , '>=', $date)->orderBy('release_date' , 'desc')->offset(0)->limit(5)->get();

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
            $priceList = Mapper::maping($movie->pricelist_categories , 'price' ,  null ,  true);
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
        }, 'actors' , 'pricelist_categories']);
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
                $priceList = Mapper::maping($movie->pricelist_categories , 'price' , null ,  true);
                $moviesDTO->price = $priceList;

                  if(count($movie->category) > 0) {
                      $moviesCatArr[] = $moviesDTO;
                  }

            }
        return array('data' =>  $moviesCatArr , 'count' => $catCount);
    }



    public function getMovie(int $id): MoviesDTO
    {

        $movie = Movies::with(['img' , 'year' , 'category' , 'actors' ,  'pricelist_categories'])->findOrFail($id);

        $movieDTO = new MoviesDTO();
        $movieDTO->id = $movie->id;
        $movieDTO->name = $movie->name;
        $movieDTO->desc = $movie->description;
        $movieDTO->rel = Carbon::parse($movie->release_date)->toDateTimeString();
        $movieDTO->runtime = $movie->running_time;
       // $movieDTO->img = $movie->img->link;
        $movieDTO->img = array(
            "id" => $movie->img->id,
            "link" => $movie->img->link
        );
        $movieDTO->year = $movie->year->year;
       $categories = Mapper::maping($movie->category, 'name' ,1);
        $movieDTO->categories = $categories;
        $tehnologies = Mapper::maping($movie->category,'name',2 );
        $movieDTO->tehnologies = $tehnologies;
        $actors = Mapper::maping($movie->actors , 'name' );
        $movieDTO->actors = $actors;
        $priceList = Mapper::maping($movie->pricelist_categories , 'price' , null , true);
        $movieDTO->price = $priceList;
        return $movieDTO;
    }

    public function addMovie(MoviesRequest $request)
    {

    /*    $hasFile = $request->hasFile('image');
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
*/
      /*  $hasFile = $request->hasFile('addMovieImage');
        $file = $request->file('addMovieImage');*/


        $base64_image = $request->get('addMovieImage');

        if(isset($base64_image)) {

            $file = public_path('assets/images/movies/');

                $linkImg = ImageResize::base64ToFile($base64_image , $file , 259 , 383 );
                $name = $request->get('addMovieName');
                $desc = $request->get('addMovieDesc');
                $relDate = $request->get('addMovieReldate');
                $relTime = $request->get('addMovieReltime');
                $runtime = $request->get('addMovieRuntime');
                $year = $request->get('addMovieYear');
                $genres = $request->get('checkArrayGenre');
                $tehnologies = $request->get('checkArrayTehno');
                $actors = $request->get('checkArrayActor');
                $price = $request->get('price');

                $categoriesCollectt = collect([$genres, $tehnologies]);
                $categories = $categoriesCollectt->collapse();
                $categories->all();

                $dateFullStr = $relDate['year'] . "-" . $relDate['month'] . "-" . $relDate['day'] . " " . $relTime['hour'] . ":" . $relTime['minute']. ":" .$relTime['second'];


            $images  = Images::create([
                'link' => $linkImg
            ]);
            $images->save();

            $movies = Movies::create([
                'name' => $name,
                'description' => $desc,
                'release_date' =>  $dateFullStr,
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
                    'created_at' => Carbon::now()->toDateTime()
                ];
                $actorsArr[] = $arrA;
            }
            MoviesActors::insert($actorsArr);

        }





    //   $this->valid = new ImageValidator();
  //     $decodeImg = $this->valid->getImageDecoded($base64_image ,$name , $maxSize, $this->arrayErrors);

        //$openLog = fopen(storage_path('logs/test.txt'), 'a');
        //  for($i = 0; $i < count($decodeImg); $i++){
        //          fwrite($openLog, $_FILES['']."\n");
        //  }
       // fclose($openLog);

   /*   if(empty($decodeImg['message']['errors'])) {

           $this->rimg->setHasFile($decodeImg['image']['fullImage']);
           $this->rimg->setFile($decodeImg['image']['fullImage']);
           $this->rimg->setName($decodeImg['image']['nameImg']);
           $this->rimg->setPath($decodeImg['image']['tmpImg']);
          $resizeImg = $this->rimg->resizeImg(250,350 );

          $name = $request->get('addMovieName');
          $desc = $request->get('addMovieDesc');
          $relDate = $request->get('addMovieReldate');
          $relTime = $request->get('addMovieReltime');
          $runtime = $request->get('runtime');
          $year = $request->get('addMovieYear');
          $genres = $request->get('checkArrayGenre');
          $tehnologies = $request->get('checkArrayTehno');
             $linkImg =  $resizeImg['link'];
          $actors = $request->get('checkArrayActor');
          $price = $request->get('price');

          $categoriesCollectt = collect([$genres, $tehnologies]);
          $categories = $categoriesCollectt->collapse();
          $categories->all();

          $dateFullStr = $relDate[0]."-".$relDate[1]."-".$relDate[2]." ".$relTime[0].":".$relTime[1];



              $images  = Images::create([
                        'link' => $linkImg
                  ]);
             $images->save();

              $movies = Movies::create([
                            'name' => $name,
                          'description' => $desc,
                         'release_date' =>  $dateFullStr,
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
                  'created_at' => Carbon::now()->toDateTime()
              ];
              $actorsArr[] = $arrA;
          }
          MoviesActors::insert($actorsArr);

      }else{
         $errors = $decodeImg['message']['errors'];
         $messagesErrors = [];
         foreach ($errors as $error){
             $messagesErrors[] = $errors;
         }

          echo ($messagesErrors);
      }*/
    }



    public function modifyMovie(Request $request , $id , $img )
    {


        $base64_image = $request->get('addMovieImage');
        $name = $request->get('addMovieName');
        $desc = $request->get('addMovieDesc');
        $relDate = $request->get('addMovieReldate');
        $relTime = $request->get('addMovieReltime');
        $runtime = $request->get('addMovieRuntime');
        $year = $request->get('addMovieYear');
        $genres = $request->get('checkArrayGenre');
        $tehnologies = $request->get('checkArrayTehno');
        $actors = $request->get('checkArrayActor');
        $linkImg = null;
        $images = Images::findOrFail($img);

        $categoriesCollectt = collect([$genres, $tehnologies]);
        $categories = $categoriesCollectt->collapse();
        $categories->all();

        $dateFullStr = $relDate['year'] . "-" . $relDate['month'] . "-" . $relDate['day'] . " " . $relTime['hour'] . ":" . $relTime['minute']. ":" .$relTime['second'];
       /* if($hasFile){
            $this->rimg->setHasFile($hasFile);
            $this->rimg->setFile($file);
            $resizeImg = $this->rimg->resizeImg(250,350 );
            $linkImg =  $resizeImg['link'];

        }else{
            $defImage = Images::findOrFail($img);
            $linkImg  = $defImage->link;
        }*/



       if(!isset($base64_image)){

           $validate = Validator::make($request->all(), [
               'addMovieImage' => 'nullable',

           ]);
           if(!$validate->fails()) {
               $images->update([
                   'updated_at' => Carbon::now()->toDateTime()
               ]);
           }else{
               $error = $validate->errors()->first();
               $r = fopen(storage_path('logs/test.txt') , 'a');
               $write = fwrite($r , $error);
               fclose($r);
           }

       }else{
           $messages = [
               'addMovieImage.required'  => 'Image is not uploaded.',
               'addMovieImage.base64image'  => 'This file  is not image.',
               'addMovieImage.base64mimes'  => 'This image extension is not allowed .',
               'addMovieImage.base64max'  => 'Maximum size of image is 2 MB.',
           ];

           $validate = Validator::make($request->all(), [
                  'addMovieImage' => 'required|base64image|base64mimes:jpg,jpeg,png|base64max:2000',
           ] , $messages);
           if(!$validate->fails()) {
               $images->update([
                   'link' => $linkImg,
                   'updated_at' => Carbon::now()->toDateTime()
               ]);
           }else{
               $error = $validate->errors()->first();
               $r = fopen(storage_path('logs/test.txt') , 'a');
               $write = fwrite($r , $error);
               fclose($r);
           }
       }

        $messages = [
            'addMovieName.required'  => 'Name is required.',
            'addMovieDesc.required'  => 'Date is required.',
            'addMovieReldate.required'  => 'Relase datetime is required.',
            'addMovieReltime.required'  => 'Relase time is required.',
            'addMovieRuntime.required'  => 'Runtime is required.',
            'addMovieYear.required'  => 'Year is required.',
            'checkArrayGenre.required'  => 'Genre is required.',
            'checkArrayTehno.required'  => 'Tehnology is required.',
            'checkArrayActor.required' => 'Actors are required',
      /*      'addMovieImage.required'  => 'Image is not uploaded.',
            'addMovieImage.base64image'  => 'This file  is not image.',
            'addMovieImage.base64mimes'  => 'This image extension is not allowed .',
            'addMovieImage.base64max'  => 'Maximum size of image is 2 MB.',*/
            'addMovieName.max'  => 'Name must max 250 characters.',
            'addMovieDesc.max'  => 'Description must max 250 characters.',
        ];

        $validate = Validator::make($request->all(), [
         //   'addMovieImage' => 'required|base64image|base64mimes:jpg,jpeg,png|base64max:2000',
            'addMovieName' => 'required|max:250',
            'addMovieDesc' => 'required|max:2000',
            'addMovieReldate' => 'required',
            'addMovieReltime' => 'required',
            'addMovieRuntime' => 'required|numeric',
            'addMovieYear' => 'required',
            'checkArrayGenre' => 'required|array',
            'checkArrayTehno' => 'required|array',
            'checkArrayActor' => 'required|array'
        ] , $messages);
        if(!$validate->fails()) {


            $movies = Movies::findOrFail($id);
            $movies->update([
                'name' => $name,
                'description' => $desc,
                'release_date' => $dateFullStr,
                'running_time' => $runtime,
                'year_id' => $year,
                'updated_at' => Carbon::now()->toDateTime()
            ]);


            //  $r = fopen(storage_path('logs/test.txt') , 'a');
            /*  for ($i = 0; $i < count(json_decode($categories)); $i++) {
                  for ($j = 0; $j < count($categories[$i]); $j++){

                      $write = fwrite($r , $categories[$i][$j]);
                  }
              }*/
            /*   for ($i = 0; $i < count(json_decode($categories)); $i++) {

                       $write = fwrite($r , $categories[$i].",");
               }

               fclose($r);*/

            /*     foreach ($categories as $genreTehno) {
                     foreach ($genreTehno as $cat){
                         $arr = [
                             //   'movie_id' => $id,
                             'category_id' => $cat,
                             'updated_at' => Carbon::now()->toDateTime()
                         ];
                         $catArr[] = $arr;
                     }

                 }

                 if (count($categories) == 1) {
                     MoviesCategories::where('movie_id', $id)->update($arr);
                 } else {
                     MoviesCategories::where('movie_id', $id)->update($catArr);
                 }*/


            /*   for($i = 0; $i < count($categories); $i++){
                   $arr = [
                       //         'movie_id' => $id,
                       'actor_id' => $categories[$i],
                       'updated_at' => Carbon::now()->toDateTime()
                   ];
                   $actorsArr[] = $arr;
               }

               if (count($categories) == 1) {
                   MoviesCategories::where('movie_id', $id)->update($arr);
               } else {
                   MoviesCategories::whereIn('movie_id' ,[$id])->update($catArr);
               }*/

            $catArr = [];
            $newCatArr = [];
            if (count($categories) > 0) {

                foreach ($categories as $cat) {
                   /*   $arrC = [
                           'movie_id' => $id,
                          'category_id' => $cat,
                          'updated_at' => Carbon::now()->toDateTime()
                      ];
                        $catArr[] = $arrC;*/

                    $ifExistCat = MoviesCategories::where([['movie_id', '=', $id], ['category_id', '=', $cat]])->first();
                    if ($ifExistCat != null) {
                        $updateCat = MoviesCategories::where(['movie_id' => $id]);

                        $updateCat->movie_id = $id;
                        $updateCat->category_id = $cat;
                        $updateCat->updated_at = Carbon::now()->toDateTime();


                    } else {

                       /* $arr = [
                            'category_id' => $cat,
                            'created_at' => Carbon::now()->toDateTime()
                        ];
                        $catArr[] = $arr;
                        $newCatArr[] = $cat;*/
                    /*    if(count($newCatArr) == 1)
                            MoviesCategories::insert($arr);
                        else
                            MoviesCategories::insert($catArr);*/
                        $insCat = MoviesCategories::create([
                            'movie_id' => $id,
                            'category_id' => $cat,
                            'created_at' => Carbon::now()->toDateTime()
                        ]);

                      /*   $updateCat->category_id = $cat;
                         $updateCat->updated_at = Carbon::now()->toDateTime();*/
                    }


                    /*  $updateCat = MoviesCategories::where('movie_id', $id);
                      $updateCat->category_id = $cat;
                      $updateCat->updated_at = Carbon::now()->toDateTime();*/


                }
              /*  $insertOrUpdate = new ResponseData();
                if(count($categories) == 1){
                    $insertOrUpdate->insertOrUpdate($arrC , MoviesCategories::getModel()->getTable());
                }else{
                    $insertOrUpdate->insertOrUpdate($catArr, MoviesCategories::getModel()->getTable());
                }*/



                //               $updateCat = MoviesCategories::where('movie_id', $id);
                // $updateCat->upsert($catArr, ['movie_id'], ['category_id']);
                //      MoviesCategories::upsert($catArr, ['movie_id'], ['category_id']);
            }

            /* $r = fopen(storage_path('logs/test2.txt'), 'a');
               $write = fwrite($r, $actor);
               fclose($r);*/

            $actorsArr = [];
            if (count($actors) > 0) {
                foreach ($actors as $actor) {
                    /*  $arrA = [
                          'actor_id' => $actor,
                          'updated_at' => Carbon::now()->toDateTime()
                      ];
                      $actorsArr[] = $arrA;*/
                    //
                  /*  $updateActors = MoviesActors::where('movie_id', $id);
                    $updateActors->actor_id = $actor;
                    $updateActors->updated_at = Carbon::now()->toDateTime();*/

                    $ifExistAct = MoviesActors::where([['movie_id', '=', $id], ['actor_id', '=', $actor]])->first();
                    if ($ifExistAct != null) {
                        $updateAct = MoviesActors::where(['movie_id' => $id]);

                        $updateAct->movie_id = $id;
                        $updateAct->actor_id = $actor;
                        $updateAct->updated_at = Carbon::now()->toDateTime();
          ;

                    } else {


                       $insAct = MoviesActors::create([
                            'movie_id' => $id,
                            'actor_id' => $actor,
                            'created_at' => Carbon::now()->toDateTime()
                        ]);

                    }

                }

             /*   if(count($actors) == 1){
                    $insertOrUpdate->insertOrUpdate($arrA , MoviesActors::getModel()->getTable());
                }else{
                    $insertOrUpdate->insertOrUpdate($actorsArr, MoviesActors::getModel()->getTable());
                }*/

                //   MoviesActors::upsert($actorsArr, ['movie_id'], ['actor_id']);

                /* $r = fopen(storage_path('logs/test2.txt'), 'a');
                                 $write = fwrite($r, $actor);
                                 fclose($r);*/


                /*  for($i = 0; $i < count($actors); $i++){
                      for($j = 0; $j < count($actors[$i]); $j++) {
                          $arrA = [
                              //         'movie_id' => $id,
                              'actor_id' => $actors[$i][$j],
                              'updated_at' => Carbon::now()->toDateTime()
                          ];
                          $actorsArr[] = $arrA;
                      }
                  }*/

                //  MoviesActors::where('movie_id', $id)->update($actorsArr);


                //    $r = fopen(storage_path('logs/test2.txt') , 'a');
                //     $write = fwrite($r , print_r($actorsArr));
                //     fclose($r);


                /*  if (count($actors) == 1) {
                      MoviesActors::where('movie_id', $id)->update($arrA);
                  } else {
                      MoviesActors::where(['movie_id'=> $id])->update($actorsArr);
                  }*/

            } else {
                $error = $validate->errors()->first();
                $r = fopen(storage_path('logs/test.txt'), 'a');
                $write = fwrite($r, $error);
                fclose($r);
            }

        }
    }

    public function deleteMovie($id)
    {
        $image = Images::findOrFail($id);

        if ($image != null ) {
            $image->delete();
        }


    }

}
