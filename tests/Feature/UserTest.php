<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
class UserTest extends TestCase
{

     protected $user;
     private static $roleId = 2;




    /**
     * Create user and get token
     * @return string
     */
    protected function authenticate(){

        $user = User::first();
        $token = auth()->login($user);
        return $token;
    }


// Testiranje CRUD-a korisnika za admin panel ako je korisnik autorizovan

    /**
     * @test
     * Test
     */

    public function  addUserAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addUser'),[
            'name' => 'Test Test',
            'username' => 'test2',
             'email' => 'test2@gmail.com',
             'password' => 'Secret1234',
              'role' => self::$roleId
        ]);
        $response->assertStatus(201)->assertExactJson([
            'message' => "User is successfully added"
        ]);

    }


    /**
     * @test
     * Test
     */

    public  function getUsersAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET',route('admin.getUsers'));
        $response->assertStatus(200);

    }

    /**
     * @test
     * Test
     */

    public  function getUserForEditAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET',route('admin.getUserEdit' , ['id' => 1]));
        $response->assertStatus(200);

    }


    /**
     * @test
     * Test
     */

    public  function updateUserAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateUser' , ['id' => 24]) , [
            'name' => 'Tester Tester',
            'username' => 'test2',
            'email' => 'test2@gmail.com',
            'password' => 'Secret1234',
            'role' => self::$roleId
        ]);
        $response->assertStatus(204);

    }

    /**
     * @test
     * Test
     */

    public  function deleteUserAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('DELETE',route('admin.deleteUser' , ['id' => 24]));
        $response->assertStatus(204);

    }





// Testiranje CRUD-a korisnika za admin panel ako korisnik nije autorizovan


    /**
     * @test
     * Test
     */

    public  function getUsersAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('GET',route('admin.getUsers'));
        $response->assertStatus(401);

    }

    /**
     * @test
     * Test
     */

    public function  addUserAdminTest_IfUserIsNotAutentificated(){
        //Get token

        $response = $this->json('POST',route('admin.addUser'),[
            'name' => 'Test Test',
            'username' => 'test2',
            'email' => 'test2@gmail.com',
            'password' => 'Secret1234',
            'role' => self::$roleId
        ]);
        $response->assertStatus(401);

    }

    /**
     * @test
     * Test
     */

    public  function getUserForEditAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('GET',route('admin.getUserEdit' , ['id' => 1]));
        $response->assertStatus(401);

    }


    /**
     * @test
     * Test
     */

    public  function updateUserAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('PUT',route('admin.updateUser' , ['id' => 24]) , [
            'name' => 'Tester Tester',
            'username' => 'test2',
            'email' => 'test2@gmail.com',
            'password' => 'Secret1234',
            'role' => self::$roleId
        ]);
        $response->assertStatus(401);
    }

    /**
     * @test
     * Test
     */

    public  function deleteUserAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('DELETE',route('admin.deleteUser' , ['id' => 24]));
        $response->assertStatus(401);

    }

    //Testiranje validacije podataka

    /**
     * @test
     * Test
     */

    public function addUser_WrongValidateDataTest(){

       $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addUser'),[
            'name' => 'test test',
            'username' => 'test2',
            'email' => 'test2',
            'password' => 'Secret1234',
            'role' => self::$roleId
        ]);
        $response->assertStatus(422);

    }

    /**
     * @test
     * Test
     */

    public function addUser_EmptyDataTest(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addUser'),[
            'name' => '',
            'username' => '',
            'email' => '',
            'password' => '',
            'role' => self::$roleId
        ]);
        $response->assertStatus(422);

    }

    /**
     * @test
     * Test
     */

    public  function updateUserTest_WrongValidateDataTest(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateUser' , ['id' => 24]) , [
            'name' => 'Tester Tester',
            'username' => 'tesT2',
            'email' => 'test2',
            'password' => 'Secret1234',
            'role' => self::$roleId
        ]);
        $response->assertStatus(422);

    }

    /**
     * @test
     * Test
     */

    public  function updateUserTest_EmptyDataTest(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateUser' , ['id' => 24]) , [
            'name' => '',
            'username' => '',
            'email' => '',
            'password' => '',
            'role' => self::$roleId
        ]);
        $response->assertStatus(422);

    }


    // Testiranje tabele baze podataka da li postoji

    public function testDatabase()
    {

        $this->assertDatabaseHas('users', [
            'email' => 'jovan@gmail.com'
        ]);
    }


}
