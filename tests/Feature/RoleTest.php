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
    protected $mock;


    /**
     * Create user and get token
     * @return string
     */
    protected function authenticate(){

        $user = User::first();
        $token = auth()->login($user);
        return $token;
    }


    // Testiranje CRUD-a uloge za admin panel ako je korisnik autorizovan

    /**
     * @test
     * Test
     */


    public function getRolesAdminTest_IfUserIsAutentificated(){
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET',route('admin.getRoles'));
        $response->assertStatus(200);
    }


    /**
     * @test
     * Test
     */

    public function addRoleAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addRole') , [
            'name' => 'Moderator'
        ]);
        $response->assertStatus(201)->assertExactJson([
            'message' => "Role is successfully added"
        ]);

    }

    /**
     * @test
     * Test
     */

    public function getRoleForEditAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET',route('admin.getRoleEdit' , ['id' => 2]) );
        $response->assertStatus(200);

    }

    /**
     * @test
     * Test
     */

    public function updateRoleAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateRole' , ['id' => 1]) , [
            'name' => 'Moderator'
        ] );
        $response->assertStatus(204);

    }

    /**
     * @test
     * Test
     */

    public function deleteRoleAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('DELETE',route('admin.deleteRole' , ['id' => 17]));
        $response->assertStatus(204);

    }

    // Testiranje CRUD-a uloge za admin panel ako korisnik nije autorizovan

    /**
     * @test
     * Test
     */


    public function getRolesAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('GET',route('admin.getRoles'));
        $response->assertStatus(401);
    }


    /**
     * @test
     * Test
     */

    public function addRoleAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('POST',route('admin.addRole') , [
            'name' => 'Moderator'
        ]);
        $response->assertStatus(401);

    }

    /**
     * @test
     * Test
     */

    public function getRoleForEditAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('GET',route('admin.getRoleEdit' , ['id' => 2]) );
        $response->assertStatus(401);

    }

    /**
     * @test
     * Test
     */

    public function updateRoleAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('PUT',route('admin.updateRole' , ['id' => 1]) , [
            'name' => 'Moderator'
        ] );
        $response->assertStatus(401);

    }

    /**
     * @test
     * Test
     */

    public function deleteRoleAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('DELETE',route('admin.deleteRole' , ['id' => 17]));
        $response->assertStatus(401);

    }

    //Testiranje validacije podataka


    /**
     * @test
     * Test
     */
    public  function addRoleAdminTest__WrongValidateDataTest(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addRole'),[
            'name' => "Mo" ,

        ]);
        $response->assertStatus(422);

    }



    /**
     * @test
     * Test
     */
    public  function updateRoleAdminTest__WrongValidateDataTest(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateRole' , ['id' => 17]),[
            'name' => "Mo" ,
        ]);
        $response->assertStatus(422);

    }


    /**
     * @test
     * Test
     */
    public  function addRoleAdminTest__EmptyDataTest(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addRole'),[
            'name' => '' ,
        ]);
        $response->assertStatus(422);

    }



    /**
     * @test
     * Test
     */
    public  function updateRoelAdminTest__EmptyDataTest(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateRole' , ['id' => 17]),[
            'name' => '' ,
        ]);
        $response->assertStatus(422);

    }


    /**
     * @test
     * Test
     */


    // Testiranje tabele baze podataka da li postoji

    public function testDatabase()
    {

        $this->assertDatabaseHas('roles', [
            'name' => 'User'
        ]);
    }




}
