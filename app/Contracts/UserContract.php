<?php


namespace App\Contracts;
use App\DTO\UserDTO;
use App\Http\Requests\UserAdminRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\PaginateRequest;

interface UserContract
{
         public function getUsers(PaginateRequest $request): array;
         public function findUser(int $id): UserDTO;
          public function loginUser(string $email , string $password): UserDTO;
          public  function addUser(UserAdminRequest $request);
          public  function modifyUser(Request $request ,int $id);
          public function deleteUser(int $id);

}
