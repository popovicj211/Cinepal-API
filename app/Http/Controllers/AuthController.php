<?php

namespace App\Http\Controllers;
use App\Contracts\UserContract;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
//use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Log;
use App\Mail\PHPMail;
use Illuminate\Support\Facades\DB;

class AuthController extends ApiController
{
    public $loginAfterSignUp = true;
private const ROLESG = 2;
private $tokenEmail;
private $mailer;
private $verifyEmail;

    /**
     * Create a new AuthController instance.
     *
     * @param UserContract $service
     */
   public function __construct(UserContract $service)
    {
            parent::__construct($service);
            $this->service = $service;
     //   $this->middleware('auth:api', ['except' => ['login']]);
         // parent::__construct();
               $this->mailer = new PHPMail();
    }

    public function login(Request $request)
    {

        $credentials = $request->only(['email', 'password']);
     //    $credentials = $request->only([$request->get('email') , $request->get('password')]);
            if (!$token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

          return  response()->json(['message' => 'Successfully logged in','user'=> $this->me() , 'token' => $this->respondWithToken($token) ]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
   public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return response()->json($this->respondWithToken(auth()->refresh()));
    }

    /**
     * Get the token array structure.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */



    public function register(UserRequest $request){

           $email = $request->get('email');
           $this->tokenEmail = md5(time().$email.rand(1,10000));
           $this->mailer->setToken($this->tokenEmail);
           $this->mailer->setEmail($email);
           $this->mailer->verification();
      try {
          $user = User::create([
              'name' => $request->get('name'),
              'username' => $request->get('username'),
              'email' =>  $email,
              'password' => Hash::make($request->get('password')),
              //'role_id' => self::ROLESG,
               'email_token' => $this->tokenEmail
          ]);
               $user->save();
          $token = auth()->login($user);

      }catch (QueryException $e){
          Log::error("Error, register user:".$e->getMessage());
          return response()->json("Error, user not registered" , 500);
      }
   //     return $this->respondWithToken($token);
        return response()->json(array("message" => "Please verify your account on your email inbox", "token" => $this->respondWithToken($token)));
    }

    public function verify($tokenemail){
         try {
             $user = User::where('email_token', '=' ,$tokenemail);
             $user->update([
                 'email_verified_at' => Carbon::now()
             ]);
       //  $pr = $this->verifyEmail->Activate($token);

         }catch (QueryException $e){
             Log::error("Error, verify user:".$e->getMessage());
          //   return response()->json("Error, verify is not successfully" , 500);
             return  redirect()->route('showverify')->with("message" , "Verify is not successfully");
         }catch (ModelNotFoundException $e){
            return  redirect()->route('showverify');
        }
             return response()->json("Verify is successfully" , 200);
      //  return redirect()->route('showverify')->with("message" , "Verify is not successfully");
      //  return response()->json(["token" => $tokenemail]);
    }


    public function showverify(){
            return view('welcome');
    }

    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];

    }

    public function tk(){
        $credentials = ['email' => 'geni@gmail.com' , 'password' => 'Geni1234'];
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
         return dd($token);
    }

}
