<?php


namespace App\Services;
use App\DTO\UserDTO;
use App\Contracts\UserContract;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\PaginateRequest;


class UserService extends BaseService implements UserContract
{

           public function __construct($rimg = null)
           {
               parent::__construct($rimg);
           }

    public function getUsers(PaginateRequest $request): array
           {
              $page = $request->get('page');
               $perPage = $request->get('perPage');
               $users =  User::with('role');
               $usersPag  = $this->generatePagedResponse($users, $perPage , $page);
           //    return  $result ;




               $usersArr = [];

               foreach ($usersPag as $user)
               {
                   $userDTO = new UserDTO();

                   $userDTO->id = $user->id;
                   $userDTO->name = $user->name;
                   $userDTO->username = $user->username;
                   $userDTO->email = $user->email;
                   $userDTO->role = $user->role->name;

                   $usersArr[] = $userDTO;
               }

                 return $usersArr;
           }

           public function findUser(int $id): UserDTO
           {
               $user = User::find($id);

               $userDTO = new UserDTO();
               $userDTO->id = $user->id;
               $userDTO->name = $user->name;
               $userDTO->email = $user->email;
               $userDTO->role = $user->role->name;

               return $userDTO;

           }

         public function addUser(UserRequest $request)
         {
             $name = $request->get('name');
             $username = $request->get('username');
             $email = $request->get('email');
             $password = $request->get('password');
             $role = $request->get('role');

              $user = User::create([
                      'name' => $name,
                       'username' => $username,
                       'email' => $email,
                        'email_verified_at' => Carbon::now()->toDateTime(),
                        'password' => Hash::make($password),
                         'role_id' => $role,
                         'created_at' => Carbon::now()->toDateTime()
              ]);

              $user->save();

         }
         public function modifyUser(Request $request, int $id)
         {

             $request->validate([
                     'name' => 'required|regex:/^[A-Z][a-z]{3,24}(\s[A-Z][a-z]{3,24})+$/',
                      'username' => 'required|regex:/^[\w\-\@\+\?\!\.]{3,19}$/',
                      'email' => 'required|email',
                       'password' => 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\d]).{8,}$/'
             ]);

             $name = $request->get('name');
             $username = $request->get('username');
             $email = $request->get('email');
             $password = $request->get('password');
             $role = $request->get('role');

             $user = User::findOrFail($id);


             if (isset($password)) {
                 $user->update([
                     'name' => $name,
                     'username' => $username,
                     'email' => $email,
                     'email_verified_at' => Carbon::now()->toDateTime(),
                     'password' => Hash::make($password),
                     'role_id' => $role,
                     'updated_at' => Carbon::now()->toDateTime()
                 ]);
             } else {
                 $user->update([
                     'name' => $name,
                     'username' => $username,
                     'email' => $email,
                     'email_verified_at' => Carbon::now()->toDateTime(),
                     'role_id' => $role,
                     'updated_at' => Carbon::now()->toDateTime()
                 ]);
             }

         }

         public function deleteUser(int $id)
         {
             $user = User::findOrFail($id);

             if ($user != null ) {
                 $user->delete();
             }
         }


}
