<?php


namespace App\Contracts;
use App\DTO\RoleDTO;
use App\Http\Requests\RoleRequest;

interface RoleContract
{
          public function getRoles(): array ;
          public function findRole(int $id): RoleDTO;
          public  function addRole(RoleRequest $request);
          public function modifyRole(RoleRequest $request , int $id);
          public function deleteRole(int $id);

}
