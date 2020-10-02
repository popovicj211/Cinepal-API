<?php

namespace Tests\Feature;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MoviesController;
use App\Models\Role;
use App\Models\User;
use App\Services\MoviesService;
use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Mockery;

class RoleTest extends TestCase
{
    use RefreshDatabase  , WithFaker;
    protected $mock;

    /**
     * @test
     * Test
     */

    // Roles - user is authentificate

    public function addRoleTest_IfUserIsAutentificate(){

           factory( Role::class )->create();
        /* Role::create([
             'name' => $this->faker->name,
             'created_at' => Carbon::now()
         ]);*/


        $response = $this->json('POST',route('admin.addRole'),[
            'name' => 'AdminTesting',
            'created_at' => Carbon::now()
        ]);
        $response->assertStatus(201);
        //Get count and assert
        /*    $count = $this->user->users()->count();
            $this->assertEquals(1,$count);*/
    }

    /**
     * @test
     * Test
     */

    public function getRolesTest_IfUserIsAutentificate(){

        $role = Role::create([
            'name' => 'AdminTesting',
            'created_at' => Carbon::now()->toDateTime()
        ]);
        $role->save();
        $user = User::create([
            'name' => 'Test Test',
            'username' => 'test2',
            'email' => 'test2@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('Secret1234'),
            'role_id' => 1,
            'email_token' => md5(time().'test2@gmail.com'.rand(1,10000)),
            'created_at' => Carbon::now()
        ]);
        $login = auth()->login($user);
        $token = auth()->attempt($login);
        $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET',  route('admin.getRoles'))->assertStatus(200);
    }


    /**
     * @test
     * Test
     */

// Roles - user is not authentificate

    public function getRolesTest_IfUserIsNotAutentificate(){

        $this->json('GET',  route('admin.getRoles'))
            ->assertStatus(401);

    }

    /**
     * @test
     * Test
     */

    public function updateRoleTest_IfUserIsNotAutentificated(){

        $this->json('PUT',  route('admin.updateRole',['id' => 1]) ,[
            'name' => 'AdminTest',
            'created_at' => Carbon::now()
        ])->assertStatus(401);

    }
    /**
     * @test
     * Test
     */

    public function getRoleEditTest_IfUserIsNotAutentificated(){

        $this->json('GET',  route('admin.getRoleEdit', ['id' => 1]))
            ->assertStatus(401)->assertJson([
                "message"=> "Please, attach a Bearer Token to your request"
            ]);

    }
    /**
     * @test
     * Test
     */

    public function deleteRoleTest_IfUserIsNotAutentificated(){

        $this->json('DELETE',  route('admin.deleteRole'))
            ->assertStatus(401);
    }

    /**
     * @test
     * Test
     */

    public function mockingRole(){
           Mockery::mock('App\Models\Role');
    }


    public function testControllerMovies()
    {



       // $venueController = new MoviesController('App\Contracts\MoviesContract');
       // $venueController->getMovie(1);
       // $this->assertEquals($this->mock->find(1),2);
        $interfaceMock = Mockery::mock('App\Contracts\MoviesContract');
        $interfaceMock->shouldReceive('getNewMovies')->once()->andReturn(1);

        $moviesControlller = new MoviesController($interfaceMock);

    }



}
