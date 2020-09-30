<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
class AuthTest extends TestCase
{
  use RefreshDatabase , DatabaseMigrations;
  /*  /**
     * @test
     * Test registration
     */

  /*  public function testRegister(){
        //User's data
        $data = [
            'name' => 'Test Test',
             'username' => 'test',
            'email' => 'test@gmail.com',
            'password' => 'Test1234'
        ];

        //Send post request
        $response = $this->json('POST',route('register'),$data);
        //Assert it was successful
        $response->assertStatus(201);
        //Assert we received a token
        $this->assertArrayHasKey('token',$response->json());
        //Delete data
       // User::where('email','geni@gmail.com')->delete();
    }
*/
    /**
     * @test
     * Test
     */
/*
    public function setUp(): void
    {
        parent::setUp();
        $user = new User([
            'name' => 'Test Test',
            'username' => 'test',
            'email' => 'test@gmail.com',
            'password' => 'Test1234'
        ]);
        $user->save();
    }*/

    /** @test ***/

    public function it_will_register_a_user(){
        try {
            $response = $this->post(route('register'), [
                'name' => 'Test Test',
                'username' => 'test2',
                'email' => 'testr@gmail.com',
                'password' => 'Test21234'
            ]);

            $credentials = ['email' => 'geni@gmail.com' , 'password' => 'Geni1234'];
            $token = auth()->attempt($credentials);

            $response->assertJsonStructure([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]);
        }catch (QueryException $e){
            Log::error("Error, testing register:" . $e->getMessage());
        }

    }
/*
    /**
     * @test
     * Test login
     */

   /* public function testLogin()
    {
        $credentials = ['email' => 'geni@gmail.com' , 'password' => 'Geni1234'];
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $response = $this->json('POST',route('login'),[
            'email' => 'geni@gmail.com',
            'password' => 'Geni1234',
        ]);
        //Assert it was successful and a token was received
        $response->assertStatus(200);

        $this->assertArrayHasKey('token', $token);
        //Delete the user
       // User::where('email','geni@gmail.com')->delete();
    }*/
   /* protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];

    }*/
}
