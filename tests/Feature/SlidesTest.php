<?php

namespace Tests\Feature;

use App\Models\Slides;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class SlidesTest extends TestCase
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




    // Testiranje - uzimanje podataka za prikaz slideshow-a

    /**
     * @test
     * Test
     */


    public function getSlidesTest(){
        $response = $this->json('GET',route('slides'));
        $response->assertStatus(200);
    }


// Testiranje CRUD-a slideshow-a za admin panel ako je korisnik autorizovan



    /**
     * @test
     * Test
     */

      public function getSlidesAdminTest_IfUserIsAutentificated(){

          $usr = auth()->user();

              $token = $this->authenticate();
          $response = $this->withHeaders([
              'Authorization' => 'Bearer '.$token,
          ])->json('GET',route('admin.getSlides'));
                  $response->assertStatus(200);

        }
    /**
     * @test
     * Test
     */

    public function addSlideAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addSlide') , [
                   'slideImage' => UploadedFile::fake()->image('slideMovie.jpg') ,
                    'header' => 'Super filmovi',
                    'text' => 'Super filmoviii'
        ]);
        $response->assertStatus(201)->assertExactJson([
            'message' => "Slide is successfully added",
        ]);

    }


    /**
 * @test
 * Test
 */

    public function getSlideForEditAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET',route('admin.getSlideEdit' , ['id' => 1]) );
        $response->assertStatus(200);

    }

    /**
     * @test
     * Test
     */

    public function updateSlideAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateSlide' , ['id' => 1]) , [
            'slideImage' => UploadedFile::fake()->image('slideMovie.jpg') ,
            'header' => 'Super filmovi',
            'text' => 'Super filmoviii'
        ] );
        $response->assertStatus(204);

    }

    /**
     * @test
     * Test
     */

    public function deleteSlideAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('DELETE',route('admin.deleteSlide' , ['id' => 1]));
        $response->assertStatus(204);

    }

// Testiranje CRUD-a slideshow-a za admin panel ako korisnik nije autorizovan

    /**
     * @test
     * Test
     */

    public function getSlidesAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('GET',route('admin.getSlides'));
        $response->assertStatus(401);

    }


    /**
     * @test
     * Test
     */

    public function addSlideAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('POST',route('admin.addSlide') , [
            'slideImage' => UploadedFile::fake()->image('slideMovie.jpg') ,
            'header' => 'Super filmovi',
            'text' => 'Super filmoviii'
        ]);
        $response->assertStatus(401);

    }


    /**
     * @test
     * Test
     */

    public function getSlideForEditAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('GET',route('admin.getSlideEdit' , ['id' => 1]) );
        $response->assertStatus(401);

    }

    /**
     * @test
     * Test
     */

    public function updateSlideAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('PUT',route('admin.updateSlide' , ['id' => 1]) , [
            'slideImage' => UploadedFile::fake()->image('slideMovie.jpg') ,
            'header' => 'Super filmovi',
            'text' => 'Super filmoviii'
        ] );
        $response->assertStatus(401);

    }

    /**
     * @test
     * Test
     */

    public function deleteSlideAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('DELETE',route('admin.deleteSlide' , ['id' => 1]));
        $response->assertStatus(401);

    }

    // Testiranje validacije podataka


    /**
     * @test
     * Test
     */

    public function addSlideAdminTest_WrongValidateData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addSlide') , [
            'slideImage' => 'slikaaa' ,
            'header' => 'i',
            'text' => 'i'
        ]);
        $response->assertStatus(422);

    }
    /**
     * @test
     * Test
     */

    public function updateSlideAdminTest_WrongValidateData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateSlide' , ['id' => 1]) , [
            'slideImage' => 'slikaa' ,
            'header' => 'i',
            'text' => 'i'
        ] );
        $response->assertStatus(422);

    }


    /**
     * @test
     * Test
     */

    public function addSlideAdminTest_EmptyData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addSlide') , [
            'slideImage' => null ,
            'header' => '',
            'text' => ''
        ]);
        $response->assertStatus(422);

    }
    /**
     * @test
     * Test
     */

    public function updateSlideAdminTest_EmptyData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateSlide' , ['id' => 1]) , [
            'slideImage' => null ,
            'header' => '',
            'text' => ''
        ] );
        $response->assertStatus(422);

    }

    // Testiranje tabele baze podataka da li postoji

    public function testDatabase()
    {

        $this->assertDatabaseHas('slides', [
            'header' => 'Watch the new movies'
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

        $this->mock('App\Contracts\SlidesContract');
    }

    public function mock($class)
    {
        $this->mock = \Mockery::mock($class);

        $this->app->instance($class, $this->mock);

        return $this->mock;
    }

    public function testGetSlidesContract()
    {
        $this->mock->shouldReceive('getSlides')->once();

        $response = $this->call('GET', '/api/slidess');
        $response->assertStatus(200);
    }


}
