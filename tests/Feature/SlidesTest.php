<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
//use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
class SlidesTest extends TestCase
{
    use RefreshDatabase ;
    protected $user;
/*
    protected function authenticate(){
        $user = User::create([
            'email' => 'geni@gmail.com',
            'password' => Hash::make('Geni1234'),
        ]);
        $this->user = $user;
        $token = JWTAuth::fromUser($user);
        return $token;
    }*/




      public function testGetSlides(){
          $response = $this->json('GET',route('slides'));
          $response->assertStatus(200);

        }

    public function testGetSlidesAdmin(){
        //$response = $this->json('GET',route('slides-admin'));


      //  $credentials = [ 'email' => 'geni@gmail.com', 'password' => 'Geni1234'];
      /*  if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }*/

        $user = auth()->user();
        $token = JWTAuth::fromUser($user);

        $credentials = ['email' => 'geni@gmail.com' , 'password' => 'Geni1234'];

               /* if(!$token = auth()->attempt($credentials)){
                    return response()->json(['error' => 'Unauthorized'], 401);
                }*/

     //   $credentials = ['email' => 'testr@gmail.com' , 'password' => 'Test21234'];


      /*  $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->json('GET',route('slides-admin'));*/

            $response = $this->json('GET',route('admin.slides-get'));
            //Assert it was successful and a token was received
            $response->assertStatus(200);
            $response->withHeaders([
                'Authorization' => 'Bearer '.$token
            ]);






     /*   $credentials = request(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token
        ])->json('GET',route('slides-admin'));


        $response->assertStatus(200);

        */
       /* $credentials = [ 'email' => 'geni@gmail.com', 'password' => 'Geni1234'];
        $token= \JWTAuth::fromUser($credentials);
        $this->get(route('slides-admin'), ['Authorization' => "Bearer $token"])->assertStatus(200);*/


    }








}
