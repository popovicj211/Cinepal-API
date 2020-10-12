<?php

namespace Tests\Feature;

use App\Models\Actors;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActorTest extends TestCase
{
    private $mock;

    /**
     * Create user and get token
     * @return string
     */
    protected function authenticate(){

        $user = User::first();
        $token = auth()->login($user);
        return $token;
    }



    // Testiranje - uzimanje podataka za prikaz glumaca

    /**
     * @test
     * Test
     */

    public function getActorsTest(){

        $response = $this->json('GET',route('actors'));
        $response->assertStatus(200);
    }



// Testiranje CRUD-a glumaca za admin panel ako je korisnik autorizovan



    /**
     * @test
     * Test
     */

    public function getActorsAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET',route('admin.getActors'));
        $response->assertStatus(200);

    }
    /**
     * @test
     * Test
     */

    public function addActorAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addActor') , [
            'actor' => 'Pera Peric'
        ]);
        $response->assertStatus(201)->assertExactJson([
            'message' => "Actor is successfully added",
        ]);

    }


    /**
     * @test
     * Test
     */

    public function getActorForEditAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET',route('admin.getActorEdit' ,  ['id' => 1 ]) );
        $response->assertStatus(200);

    }

    /**
     * @test
     * Test
     */

    public function updateActorAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateActor' , [ 'id' => 3 ]) , [
            'actor' => 'Pera Peric'
        ] );
        $response->assertStatus(204);

    }

    /**
     * @test
     * Test
     */

    public function deleteActorAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('DELETE',route('admin.deleteActor' , ['id' => 3 ]));
        $response->assertStatus(204);

    }

    // Testiranje CRUD-a glumaca za admin panel ako korisnik nije autorizovan



    /**
     * @test
     * Test
     */

    public function getActorsAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('GET',route('admin.getActors' ));
        $response->assertStatus(401);

    }
    /**
     * @test
     * Test
     */

    public function addCategoryAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('POST',route('admin.addActor') , [
            'actor' => 'Testing' ,
        ]);
        $response->assertStatus(401);

    }


    /**
     * @test
     * Test
     */

    public function getCategoryForEditAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('GET',route('admin.getActorEdit' , [ 'id' => 1 ]) );
        $response->assertStatus(401);
    }

    /**
     * @test
     * Test
     */

    public function updateActorAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('PUT',route('admin.updateActor' , ['id'=> 1 ]) , [
            'actor' => 'ActionTesting'
        ] );
        $response->assertStatus(401);
    }

    /**
     * @test
     * Test
     */

    public function deleteActorAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('DELETE',route('admin.deleteActor' , [ 'id' => 3 ]));
        $response->assertStatus(401);

    }

// Testiranje validacije podataka

    /**
     * @test
     * Test
     */

    public function addActorAdminTest_WrongValidateData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addActor') , [
            'actor' => 'Me'
        ]);
        $response->assertStatus(422);

    }

    /**
     * @test
     * Test
     */

    public function updateActorAdminTest_WrongValidateData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateActor' , [ 'id' => 3 ]) , [
            'actor' => 'Me'
        ] );
        $response->assertStatus(422);

    }



    /**
     * @test
     * Test
     */

    public function addActorAdminTest_EmptyData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addActor') , [
            'actor' => ''
        ]);
        $response->assertStatus(422);

    }

    /**
     * @test
     * Test
     */

    public function updateActorAdminTest_EmptyData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateActor' , [ 'id' => 3 ]) , [
            'actor' => ''
        ] );
        $response->assertStatus(422);

    }


    // Testiranje tabele baze podataka da li postoji

    public function testDatabase()
    {

        $this->assertDatabaseHas('Actors', [
            'name' => 'Tom Cruise'
        ]);
    }

    // Testiranje interfejsa

    public function tearDown(): void
    {
        \Mockery::close();
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->mock('App\Contracts\ActorsContract');
    }

    public function mock($class)
    {
        $this->mock = \Mockery::mock($class);

        $this->app->instance($class, $this->mock);

        return $this->mock;
    }

    public function testGetActorsContract()
    {
        $this->mock->shouldReceive('getActors')->once();

        $response = $this->call('GET', '/api/actorss');
        $response->assertStatus(200);
    }


}
