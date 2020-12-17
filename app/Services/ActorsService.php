<?php


namespace App\Services;

use App\DTO\ActorsDTO;
use App\Contracts\ActorsContract;
use App\Http\Requests\ActorsRequest;
use App\Http\Requests\PaginateRequest;
use App\Models\Actors;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
class ActorsService extends BaseService  implements ActorsContract
{


      public function getActors(PaginateRequest $request): array
      {
          $actors = Actors::query();
          $page = $request->get('page');
          $perPage = $request->get('perPage');
          $actorsPag  = $this->generatePagedResponse( $actors, $perPage , $page);
          $actCount = DB::table('actors')->count();
          $actorsArr = [];

          foreach ($actorsPag['data'] as $actor)
          {
              $actorDTO = new ActorsDTO();
              $actorDTO->id = $actor->id;
              $actorDTO->name = $actor->name;

              $actorsArr[] = $actorDTO;
            /*  $actorsArr[] = intVal(\Storage::disk('local')->size('test.jpg'));
              $actorsArr[] = \Storage::disk('local')->url('test.jpg');
              $actorsArr[] = \Storage::disk('local')->path('test.jpg');
              $actorsArr[] = \Storage::disk('local')->mimeType('test.jpg');
              $actorsArr[] = \Storage::disk('local')->has('test.jpg');
              $actorsArr[] = \Storage::disk('local')->exists('test.jpg');
              $actorsArr[] = Image::make(\Storage::disk('local')->path('test.jpg'))->width();
              $actorsArr[] = Image::make(\Storage::disk('local')->path('test.jpg'))->height();*/

          }

          return  array('data' =>  $actorsArr , 'count' => $actCount);
      }

      public function findActor(int $id): ActorsDTO
      {
          $actor = Actors::findOrFail($id);
          if($actor != null) {
              $actorDTO = new ActorsDTO();
              $actorDTO->id = $actor->id;
              $actorDTO->name = $actor->name;
              return $actorDTO;
          }
      }

      public function addActor(ActorsRequest $request)
      {
          $name = $request->get('actor');
          $actor = Actors::create([
              'name' => $name
          ]);

          $actor->save();
      }

    public function modifyActor(ActorsRequest $request ,int $id)
      {

              $name = $request->get('actor');
              $actor = Actors::findOrFail($id);

              $actor->update([
                  'name' => $name,
                  'updated_at' => Carbon::now()->toDateTime()
              ]);
      }

      public function deleteActor(int $id)
      {
          $actor = Actors::findOrFail($id);

          if ($actor != null ) {
              $actor->delete();
          }
      }

}
