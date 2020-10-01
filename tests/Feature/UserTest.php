<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
class UserTest extends TestCase
{
    use RefreshDatabase ;

     protected $user;
     private static $roleId = 2;

    /**
     * Create user and get token
     * @return string
     */
    protected function authenticate(){

        $roleID = Role::all()->random()->id;


        $role = Role::create([
            'name' => 'TestUser',
            'created_at' => Carbon::now()->toDateTime()
        ]);
        $role->save();
        $user = User::create([
            'name' => 'Test Test',
            'username' => 'test2',
            'email' => 'test2@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('Secret1234'),
            'role_id' => $roleID,
            'email_token' => md5(time().'test2@gmail.com'.rand(1,10000)),
            'created_at' => Carbon::now()
        ]);
        $this->user = $user;
        $token = JWTAuth::fromUser($user);
        return $token;
    }

    /**
     * @test
     * Test
     */

    public function addUserTest(){
        //Get token
        $token = $this->authenticate();
             $this->withoutExceptionHandling();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.users-post'),[
            'name' => 'Test Test',
            'username' => 'test2',
             'email' => 'test2@gmail.com',
              'email_verified_at' => Carbon::now(),
             'password' => Hash::make('Secret1234'),
              'email_token' => md5(time().'test2@gmail.com'.rand(1,10000)),
              'created_at' => Carbon::now()
        ]);
        $response->assertStatus(200);
        //Get count and assert
        $count = $this->user->users()->count();
        $this->assertEquals(1,$count);
    }

}
