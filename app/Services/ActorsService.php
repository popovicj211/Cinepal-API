<?php


namespace App\Services;

use App\DTO\ActorsDTO;
use App\Contracts\ActorsContract;
use App\Http\Requests\ActorsRequest;
use App\Http\Requests\PaginateRequest;
use App\Models\Actors;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActorsService extends BaseService implements ActorsContract
{

      public function __construct($rimg = null)
      {
          parent::__construct($rimg);
      }

      public function getActors(PaginateRequest $request): array
      {
          $actors = Actors::query();
          $page = $request->get('page');
          $perPage = $request->get('perPage');
          $actorsPag  = $this->generatePagedResponse( $actors, $perPage , $page);

          $actorsArr = [];

          foreach ($actorsPag as $actor)
          {
              $actorDTO = new ActorsDTO();
              $actorDTO->id = $actor->id;
              $actorDTO->name = $actor->name;

              $actorsArr[] = $actorDTO;
          }

          return $actorsArr;
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
