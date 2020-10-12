<?php


namespace App\Services;
use App\DTO\RoleDTO;
use App\Contracts\RoleContract;
use App\Models\Role;
use App\Http\Requests\RoleRequest;
use Carbon\Carbon;


class RoleService extends BaseService implements RoleContract
{


    public function __construct($rimg = null)
    {
        parent::__construct($rimg);
        $this->rimg = $rimg;
    }

     public function getRoles(): array {
         $roles = Role::all();
         $rolesArr = [];
         foreach($roles as $role){
             $roleDTO = new RoleDTO();
             $roleDTO->id = $role->id;
             $roleDTO->name = $role->name;
             $rolesArr[] = $roleDTO;
         }
         return $rolesArr;
     }

     public function findRole(int $id): RoleDTO
     {
         $role = Role::find($id);
         $roleDTO = new RoleDTO();
         $roleDTO->id = $role->id;
         $roleDTO->name = $role->name;
         return $roleDTO;
     }

    public function addRole(RoleRequest $request)
     {
         $name = $request->get('name');
         $role = Role::create([
                'name' => $name,
                 'created_at' => Carbon::now()->toDateTime()
         ]);
         $role->save();
     }

    public function modifyRole( RoleRequest $request , int $id)
    {
        $name = $request->get('name');
          $role = Role::findOrFail($id);
          $role->update([
                'name' => $name,
              'updated_at' => Carbon::now()->toDateTime()
          ]);

    }
    public function deleteRole(int $id)
    {
        $role = Role::findOrFail($id);
        if ($role != null ) {
            $role->delete();
        }
    }

}
