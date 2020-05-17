<?php

namespace App\Http\Middleware;
use Tymon\JWTAuth\JWTAuth as AuthService;
use Closure;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
class JwtMiddleware extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws \Tymon\JWTAuth\Exceptions\JWTException
     */
    public function handle($request, Closure $next)
    {
        /* try {
             $user = JWTAuth::parseToken()->authenticate();
         } catch (\Exception $e) {
             if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                 return response()->json(['status' => 'Token is Invalid']);
             }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                 return response()->json(['status' => 'Token is Expired']);
             }else{
                 return response()->json(['status' => 'Authorization Token not found']);
             }
         }*/

        try {
            //Access token from the request
            $token = JWTAuth::parseToken();

            //Try authenticating user
            $user = $token->authenticate();
        } catch (TokenExpiredException $e) {
            //Thrown if token has expired
            return $this->unauthorized('Your token has expired. Please, login again.');
        } catch (TokenInvalidException $e) {
            //Thrown if token invalid
            return $this->unauthorized('Your token is invalid. Please, login again.');
        } catch (JWTException $e) {
            //Thrown if token was not found in the request.
            return $this->unauthorized('Please, attach a Bearer Token to your request');
        }

     /*   if ($user && in_array($user->role->name, $roles)) {
            return $next($request);
        }*/
        return $next($request);
       // return $this->unauthorized();
    }
        //return $next($request);
        private function unauthorized($message = null)
        {
             return response()->json([
                    'message' => $message ?? 'Unauthorized.'
                 ], 401);
        }

}
