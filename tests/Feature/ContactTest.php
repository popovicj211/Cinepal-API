<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
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

    /**
     * @test
     * Test
     */

    // Testiranje kontakta

    public  function addContactTest(){

        $response = $this->json('POST',route('contact'),[
            'contName' => "Aleksandar Katai" ,
            'contEmail' => 'katai@gmail.com',
            'contSubject' => 'Movie',
            'contMessage' => 'When will it be a movie Bloodshoot?'
        ]);
        $response->assertStatus(201);

    }

    // Testiranje CRUD-a kontakta za admin panel ako je korisnik autorizovan

    /**
     * @test
     * Test
     */

    public  function getContactSAdminTest_IfUserIsAutentificated(){
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET', route('admin.getContact'));
        $response->assertStatus(200);

    }


    /**
     * @test
     * Test
     */

  public  function addContactAdminTest_IfUserIsAutentificated(){
      $token = $this->authenticate();
      $response = $this->withHeaders([
          'Authorization' => 'Bearer '.$token,
      ])->json('POST',route('admin.addContact'),[
          'contName' => "Aleksandar Katai" ,
           'contEmail' => 'katai@gmail.com',
            'contSubject' => 'Movie',
            'contMessage' => 'When will it be a movie Bloodshoot?'
      ]);
         $response->assertStatus(201)->assertExactJson([
             'message' => "Contact is successfully added",
         ]);

  }


    /**
     * @test
     * Test
     */

    public  function getContactForEditAdminTest_IfUserIsAutentificated(){
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET',route('admin.getContactEdit' , ['id' => 1]));
        $response->assertStatus(200);

    }


    /**
     * @test
     * Test
     */

    public  function updateContactAdminTest_IfUserIsAutentificated(){
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateContact' , ['id' => 1]),[
            'contName' => "Aleksandar Katai" ,
            'contEmail' => 'katai@gmail.com',
            'contSubject' => 'Movie',
            'contMessage' => 'When will it be a movie Bloodshoot?'
        ]);
        $response->assertStatus(204);

    }


    /**
     * @test
     * Test
     */

    public  function deleteContactAdminTest_IfUserIsAutentificated(){
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('DELETE',route('admin.deleteContact' , ['id' => 1]));
        $response->assertStatus(204);

    }


    // Testiranje CRUD-a kontakta za admin panel ako korisnik nije autorizovan

    /**
     * @test
     * Test
     */
    public function getContactAdminTest_IfUserIsNotAutentificated(){

        $this->json('GET',  route('admin.getContact'))
            ->assertStatus(401);

    }

    /**
     * @test
     * Test
     */
    public  function addContactAdminTest_IfUserIsNotAutentificated(){


        $response = $this->json('POST',route('admin.addContact'),[
            'contName' => "Aleksandar Katai" ,
            'contEmail' => 'katai@gmail.com',
            'contSubject' => 'Movie',
            'contMessage' => 'When will it be a movie Bloodshoot?'

        ]);
        $response->assertStatus(401);

    }


    /**
     * @test
     * Test
     */

    public  function updateContactAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('PUT',route('admin.updateContact' , ['id' => 1]),[
            'contName' => "Aleksandar Katai" ,
            'contEmail' => 'katai@gmail.com',
            'contSubject' => 'Movie',
            'contMessage' => 'When will it be a movie Bloodshoot?'

        ]);
        $response->assertStatus(401);

    }

    /**
     * @test
     * Test
     */

    public  function getContactForEditAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('GET',route('admin.getContactEdit' , ['id' => 1]));
        $response->assertStatus(401);

    }

    /**
     * @test
     * Test
     */

    public  function deleteContactAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('DELETE',route('admin.deleteContact' , ['id' => 1]));
        $response->assertStatus(401);

    }

    //Testiranje validacije podataka

    public  function addContactTest__WrongValidateDataTest(){

        $response = $this->json('POST',route('contact'),[
            'contName' => "Aleksandar Katai" ,
            'contEmail' => 'katai@gmail.com',
            'contSubject' => 'Movie',
            'contMessage' => 'When will it be a movie Bloodshoot?'

        ]);
        $response->assertStatus(422);

    }

    /**
     * @test
     * Test
     */
    public  function addContactAdminTest__WrongValidateDataTest(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addContact'),[
            'contName' => "Aleksandar Katai 22" ,
            'contEmail' => 'katai-gmail.com',
            'contSubject' => 'Movie',
            'contMessage' => 'When will it be a movie Bloodshoot?'

        ]);
        $response->assertStatus(422);

    }



    /**
     * @test
     * Test
     */
    public  function updateContactAdminTest__WrongValidateDataTest(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateContact' , ['id' => 1]),[
            'contName' => "Aleksandar Katai 23" ,
            'contEmail' => 'katai-gmail.com',
            'contSubject' => 'Movie',
            'contMessage' => 'When will it be a movie Bloodshoot?'

        ]);
        $response->assertStatus(422);

    }
    /**
     * @test
     * Test
     */

    public  function addContactTest__EmptyDataTest(){

        $response = $this->json('POST',route('contact'),[
            'contName' => '' ,
            'contEmail' => '',
            'contSubject' => '',
            'contMessage' => ''

        ]);
        $response->assertStatus(422);

    }

    /**
     * @test
     * Test
     */
    public  function addContactAdminTest__EmptyDataTest(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addContact'),[
            'contName' => "" ,
            'contEmail' => '',
            'contSubject' => '',
            'contMessage' => ''

        ]);
        $response->assertStatus(422);

    }



    /**
     * @test
     * Test
     */
    public  function updateContactAdminTest__EmptyDataTest(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateContact' , ['id' => 1]),[
            'contName' => '' ,
            'contEmail' => '',
            'contSubject' => '',
            'contMessage' => ''

        ]);
        $response->assertStatus(422);

    }

    // Testiranje tabele baze podataka da li postoji

    public function testDatabase()
    {

        $this->assertDatabaseHas('contact', [
            'email' => 'stefan@gmail.com'
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

        $this->mock('App\Contracts\ContactContract');
    }

    public function mock($class)
    {
        $this->mock = \Mockery::mock($class);

        $this->app->instance($class, $this->mock);

        return $this->mock;
    }

    public function testaddContactContract()
    {
        $this->mock->shouldReceive('addContact')->once();

        $response = $this->call('POST', route('contact') , [
            'contName' => "Aleksandar Katai" ,
            'contEmail' => 'katai@gmail.com',
            'contSubject' => 'Movie',
            'contMessage' => 'When will it be a movie Bloodshoot?'
        ]);
        $response->assertStatus(201);
    }


}
