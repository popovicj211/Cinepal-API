<?php

namespace Tests\Feature;

use App\Models\Role;
use Carbon\Carbon;
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
    private $mock;

    protected $user;


    /**
     * Create user and get token
     * @return string
     */
    protected function authenticate(){

        $user = User::first();
        $token = auth()->login($user);
        return $token;
    }


    /**
     * @test
     * Test registration
     */

    public function testRegister(){
        //User's data
        $data = [
            'name' => 'Test Test',
             'username' => 'test',
            'email' => 'test@gmail.com',
            'password' => 'Test1234'
        ];

        //Send post request
        $response = $this->json('POST',route('register'),$data);
        $response->assertStatus(200);

    }

    /**
     * @test
     * Test
     */



    public function testLogin(){
        $data = [
            'email' => 'jovan@gmail.com',
            'password' => 'Ic3R1Tj'
        ];

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('login'),$data);
        $response->assertStatus(200);

    }

  public function testLogout(){
      $data = [];
      $token = $this->authenticate();
      $response = $this->withHeaders([
          'Authorization' => 'Bearer '.$token,
      ])->json('POST',route('logout'),$data);
      $response->assertStatus(200);
  }

    public function testEmailVerification(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET',route('verification' , ['tokenemail' => 'ade61ec159de41012491afe2de790bb9']) );
        $response->assertStatus(200);
    }

    public function testMe(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('me') , []);
        $response->assertStatus(200);
    }


    // Testiranje interfejsa

    public function tearDown(): void
    {
        \Mockery::close();
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->mock('App\Contracts\UserContract');
    }

    public function mock($class)
    {
        $this->mock = \Mockery::mock($class);

        $this->app->instance($class, $this->mock);

        return $this->mock;
    }

    public function testaddUserContract()
    {
        $this->mock->shouldReceive('addUser')->once();

        $response = $this->call('POST', '/api/register' , [
            'name' => 'Test Test',
            'username' => 'test',
            'email' => 'test@gmail.com',
            'password' => 'Test1234'
        ]);
        $response->assertStatus(200);
    }

}
