<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;



class RoleTest extends TestCase
{
    use RefreshDatabase  , WithFaker;



    /**
     * @test
     * Test
     */

    public function addRoleTest(){

      /*   factory(Role::class)->create([
            "name" => "TestUser"
        ]);*/

        $this->json('GET',  route('admin.roles-get') /*, [
            "name" => "TestUser"
        ]*/)
            ->assertStatus(201);
          /*  ->assertJson([
                "message" => "Role is successfully added"
            ]);*/

       // $this->actingAs($user , 'api');

    /*    $response = $this->json('POST',route('admin.roles-post'),[
            'name' => 'User',
            'created_at' => Carbon::now()
        ]);
        $response->assertStatus(200);*/
        //Get count and assert
    /*    $count = $this->user->users()->count();
        $this->assertEquals(1,$count);*/
    }




}
