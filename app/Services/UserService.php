<?php


namespace App\Services;
use App\DTO\UserDTO;
use App\Contracts\UserContract;
use App\Http\Requests\UserAdminRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\PaginateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class UserService extends BaseService implements UserContract
{



    public function getUsers(PaginateRequest $request): array
           {
              $page = $request->get('page');
               $perPage = $request->get('perPage');
               $users =  User::with('role');
               $usersPag  = $this->generatePagedResponse($users, $perPage , $page);
               $usrCount = DB::table('users')->count();

               $usersArr = [];

               foreach ($usersPag['data'] as $user)
               {
                   $userDTO = new UserDTO();

                   $userDTO->id = $user->id;
                   $userDTO->name = $user->name;
                   $userDTO->username = $user->username;
                   $userDTO->email = $user->email;
               //    $userDTO->role = $user->role->name;
                   $userDTO->role = array(
                                 "id" => $user->role->id,
                                  "name" => $user->role->name
                   );

                   $usersArr[] = $userDTO;
               }

                 return array( 'data' => $usersArr , 'count' => $usrCount);
           }

           public function findUser(int $id): UserDTO
           {
               $user = User::with('role')->findOrFail($id);
               if($user != null) {
                   $userDTO = new UserDTO();
                   $userDTO->id = $user->id;
                   $userDTO->name = $user->name;
                   $userDTO->username = $user->username;
                   $userDTO->email = $user->email;
                   $userDTO->role = array(
                       "id" => $user->role->id,
                       "name" => $user->role->name
                   );
                   return $userDTO;
               }
           }

       public function loginUser(string $email , string $password): UserDTO
       {
        $user = User::with('role')->where([['email' , '=', $email] , [ 'password' , '=' , Hash::make($password) ]])->first();
               $userDTO = new UserDTO();
               $userDTO->id = $user->id;
               $userDTO->name = $user->name;
                $userDTO->username = $user->username;
               $userDTO->email = $user->email;
               $userDTO->role = $user->role->name;

               return $userDTO;
      }

         public function addUser(UserAdminRequest $request)
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

           /*  $request->validate([
                     'name' => 'required|regex:/^[A-Z][a-z]{3,24}(\s[A-Z][a-z]{3,24})+$/',
                      'username' => 'required|regex:/^[\w\-\@\+\?\!\.]{3,19}$/',
                      'email' => 'required|email',
                       'password' => 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\d]).{8,}$/'
             ]);*/

             $name = $request->get('name');
             $username = $request->get('username');
             $email = $request->get('email');
             $password = $request->get('password');
             $role = $request->get('role');

             $user = User::findOrFail($id);


             if (isset($password)) {
                 $messages = [
                     'name.required'    => 'Name is required',
                     'name.regex'    => 'Name is not valid',
                     'username.required'    => 'Username is required',
                     'username.regex'    => 'Username is not valid',
                     'email.required'    => 'Email is required',
                     'email.email'    => 'Email is not valid',
                     'password.regex'    => 'Password must have at least one uppercase letter, lowercase letter and digit, 7 characters long',
                     'role.required'    => 'Role is required',
                     ];

                 $validate = Validator::make($request->all(), [
                     'name' => 'required|regex:/^[A-ZŠĐČĆŽ][a-zšđčćž]{3,24}(\s[A-ZŠĐČĆŽ][a-zšđčćž]{3,24})+$/',
                     'username' => 'required|regex:/^[\w\-\@\+\?\!\.]{3,19}$/',
                     'email' => 'required|email',
                     'password' => 'regex:/^(?=.*[a-zšđčćž])(?=.*[A-ZŠĐČĆŽ])(?=.*[\d]).{7,}$/',
                     'role' => 'required'
                 ] , $messages);
                 if(!$validate->fails()) {
                     $user->update([
                         'name' => $name,
                         'username' => $username,
                         'email' => $email,
                         'email_verified_at' => Carbon::now()->toDateTime(),
                         'password' => Hash::make($password),
                         'role_id' => $role,
                         'updated_at' => Carbon::now()->toDateTime()
                     ]);
                 }else{
                     $error = $validate->errors()->first();
                     $r = fopen(storage_path('logs/test.txt') , 'a');
                     $write = fwrite($r , $error);
                     fclose($r);
                 }
             } else {
                 $messages = [
                     'name.required'    => 'Name is required',
                     'name.regex'    => 'Name is not valid',
                     'username.required'    => 'Username is required',
                     'username.regex'    => 'Username is not valid',
                     'email.required'    => 'Email is required',
                     'email.email'    => 'Email is not valid',
                     'role.required'    => 'Role is required',
                 ];
                 $validate = Validator::make($request->all(), [
                     'name' => 'required|regex:/^[A-ZŠĐČĆŽ][a-zšđčćž]{3,24}(\s[A-ZŠĐČĆŽ][a-zšđčćž]{3,24})+$/',
                     'username' => 'required|regex:/^[\w\-\@\+\?\!\.]{3,19}$/',
                     'email' => 'required|email',
                     'role' => 'required'
                 ], $messages);
                 if(!$validate->fails()) {
                     $user->update([
                         'name' => $name,
                         'username' => $username,
                         'email' => $email,
                         'email_verified_at' => Carbon::now()->toDateTime(),
                         'role_id' => $role,
                         'updated_at' => Carbon::now()->toDateTime()
                     ]);
                 }else{
                     $error = $validate->errors()->first();
                     $r = fopen(storage_path('logs/test.txt') , 'a');
                     $write = fwrite($r , $error);
                     fclose($r);
                 }
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
