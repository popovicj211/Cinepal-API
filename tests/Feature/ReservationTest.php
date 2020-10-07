<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    private $mock;
private  static  $movieId = 2;

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

    public function addReservationTest(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('reservation') , [
                 'movieId' => self::$movieId,
                  'qty' => 2 ,
                  'priceOfTehno' => 10.00,
                   'number' => [40]
        ]);
        $response->assertStatus(201);
    }



// Testiranje CRUD-a rezervacije za admin panel ako je korisnik autorizovan



    /**
     * @test
     * Test
     */

    public function getReservationAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET',route('admin.getReservations'));
        $response->assertStatus(200);

    }
    /**
     * @test
     * Test
     */

    public function addReservationAdminTest_IfUserIsAutentificated(){
//$this->withoutExceptionHandling();
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addReservation') , [
            'movieId' => 2,
            'qty' => 2 ,
            'total' => 20.25,
            'datefrom' => '2020-10-12 16:40:00',
            'dateto' => '2020-12-28 18:00:00',
            'number' => [41]
        ]);
        $response->assertStatus(201)->assertExactJson([
            'message' => "Reservation is successfully added"
        ]);

    }


    /**
     * @test
     * Test
     */

    public function getReservationForEditAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET',route('admin.getReservationEdit' ,  ['id' => 7 ]) );
        $response->assertStatus(200);

    }

    /**
     * @test
     * Test
     */

    public function updateReservationAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateReservation' , [ 'id' => 7 ]) , [
            'movieId' => 2,
            'qty' => 2 ,
            'total' => 20.25,
            'datefrom' => '2020-10-12 16:42:00',
            'dateto' => '2020-12-28 18:00:00',
            'number' => [42]
        ] );
        $response->assertStatus(204);

    }

    /**
     * @test
     * Test
     */

    public function deleteReservationAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('DELETE',route('admin.deleteReservation' , ['id' => 7 ]));
        $response->assertStatus(204);

    }

    // Testiranje CRUD-a glumaca za admin panel ako korisnik nije autorizovan


    /**
     * @test
     * Test
     */

    public function getReservationAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('GET',route('admin.getReservations'));
        $response->assertStatus(401);
    }
    /**
     * @test
     * Test
     */

    public function addReservationAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('POST',route('admin.addReservation') , [
            'movieId' => 2,
            'qty' => 2 ,
            'total' => 20.25,
            'datefrom' => '2020-10-12 16:40:00',
            'dateto' => '2020-12-28 18:00:00',
            'number' => [41]
        ]);
        $response->assertStatus(401);

    }


    /**
     * @test
     * Test
     */

    public function getReservationForEditAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('GET',route('admin.getReservationEdit' ,  ['id' => 7 ]) );
        $response->assertStatus(401);

    }

    /**
     * @test
     * Test
     */

    public function updateReservationAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('PUT',route('admin.updateReservation' , [ 'id' => 7 ]) , [
            'movieId' => 2,
            'qty' => 2 ,
            'total' => 20.25,
            'datefrom' => '2020-10-12 16:42:00',
            'dateto' => '2020-12-28 18:00:00',
            'number' => [42]
        ] );
        $response->assertStatus(401);

    }

    /**
     * @test
     * Test
     */

    public function deleteReservationAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('DELETE',route('admin.deleteReservation' , ['id' => 7 ]));
        $response->assertStatus(401);

    }



// Testiranje validacije podataka

    /**
     * @test
     * Test
     */

    public function addReservationAdminTest_WrongValidateData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addReservation') , [
            'movieId' => 2,
            'qty' => 2 ,
            'total' => 20.25,
            'datefrom' => '2020-10:12 16:42:00',
            'dateto' => '2020-12:28 18:00:00',
            'number' => 42
        ]);
        $response->assertStatus(422);

    }

    /**
     * @test
     * Test
     */

    public function updateReservationAdminTest_WrongValidateData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateReservation' , [ 'id' => 7 ]) , [
            'movieId' => 2,
            'qty' => 2 ,
            'total' => 20.25,
            'datefrom' => '2020-10:12 16:42:00',
            'dateto' => '2020-12:28 18:00:00',
            'number' => 42
        ] );
        $response->assertStatus(422);

    }



    /**
     * @test
     * Test
     */

    public function addReservationAdminTest_EmptyData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addReservation') , [
            'movieId' => null,
            'qty' => null,
            'total' => null,
            'datefrom' => '',
            'dateto' => '',
            'number' => ['']
        ]);
        $response->assertStatus(422);

    }

    /**
     * @test
     * Test
     */

    public function updateReservationAdminTest_EmptyData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateReservation' , [ 'id' => 7]) , [
            'movieId' => null,
            'qty' => null,
            'total' => null,
            'datefrom' => '',
            'dateto' => '',
            'number' => ['']
        ] );
        $response->assertStatus(422);

    }


    // Testiranje tabele baze podataka da li postoji

    public function testDatabase()
    {

        $this->assertDatabaseHas('reservation', [
            'qtypersons' => 1
        ]);
    }



}
