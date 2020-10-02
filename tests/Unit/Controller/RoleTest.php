<?php

namespace Tests\Unit\Controller;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Hash;
class RoleTest extends TestCase
{
use RefreshDatabase , WithFaker;
    /**
     * @test
     * Test
     */

    // Roles - user is authentificate

    public function addRoleTest(){

        factory(Role::class)->create();
        $user = factory(User::class)->create([
            'email' => 'sample@gmail.com',
            'password' => Hash::make('sample123'),
        ]);

        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        /*  ->assertJson([
              "message" => "Role is successfully added"
          ]);*/

        // $this->actingAs($user , 'api');

        $response = $this->json('POST',route('admin.addRole'),[
            'name' => $this->faker->name,
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
        ])->json('GET',  route('admin.getRoles'))
            ->assertStatus(200);
    }

}
