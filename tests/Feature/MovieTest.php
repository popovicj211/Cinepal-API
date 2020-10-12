<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Validation\ValidationException;
class MovieTest extends TestCase
{
private $mock;
    private static $catId = [3,5];
    private static  $actorId = [3,5];

    /**
     * Create user and get token
     * @return string
     */
    protected function authenticate(){

        $user = User::first();
        $token = auth()->login($user);
        return $token;
    }

    // Testiranje - uzimanje podataka za prikaz filmova

    /**
     * @test
     * Test
     */

    public function getMoviesTest(){
        $response = $this->json('GET',route('movies'));
        $response->assertStatus(200);
    }

    /**
     * @test
     * Test
     */

    public function getNewMoviesTest(){
        $response = $this->json('GET',route('newMovies'));
        $response->assertStatus(200);
    }

    /**
     * @test
     * Test
     */


    public function getMovieTest(){
        $response = $this->json('GET',route('movie' , ['id' => 7]));
        $response->assertStatus(200);
    }

    // Testiranje CRUD-a filma za admin panel ako je korisnik autorizovan

    /**
     * @test
     * Test
     */

    public function getMoviesAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET',route('admin.getMovies'));
        $response->assertStatus(200);

    }

    /**
     * @test
     * Test
     */

    public function addMovieAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->json('POST',route('admin.addMovie') , [
            'name' => 'Bloodshot',
            'desc' => 'Action',
            'rel' =>  '2020-11-11 14:30:00',
            'runtime' => 150,
           'image' => UploadedFile::fake()->image('movies_1234.jpg'),
            'year' => 3,
            'category' => [3,5],
            'actors' => [3,5]
        ]);
        $response->assertStatus(201)->assertExactJson([
            'message' => "Movie is successfully added",
        ]);

    }

    /**
 * @test
 * Test
 */

    public function getMovieForEditAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->json('GET',route('admin.getMovieEdit' , ['id' => 2]));
        $response->assertStatus(200);

    }


    /**
     * @test
     * Test
     */

    public function updateMovieAdminTest_IfUserIsAutentificated(){
        $rel = '2020:12:28 14:00:00';
        //  $this->withoutExceptionHandling();
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->json('PUT',route('admin.updateMovie' , ['id' => 2]) , [
            'upName' => 'Bloodshot',
            'upDesc' => 'Action',
            'upRel' =>   '2020-10-12 16:42:00',
            'upRuntime' => 150,
            'upImage' => UploadedFile::fake()->image('movies_1234.jpg'),
            'upYear' => 3,
            'upCategory' => [3,5],
            'upActors' => [3,5]
        ]);
        $response->assertStatus(204);

    }

    /**
     * @test
     * Test
     */
    public function deleteMovieAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->json('DELETE',route('admin.updateMovie' , ['id' => 7]) );
        $response->assertStatus(204);

    }


    // Testiranje CRUD-a filma za admin panel ako je korisnik autorizovan

    /**
     * @test
     * Test
     */

    public function getMoviesAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('GET',route('admin.getMovies'));
        $response->assertStatus(401);
    }

    /**
     * @test
     * Test
     */

    public function addMovieAdminTest_IfUserIsNotAutentificated(){
        $rel = '2020:12:28 14:00:00';
        $token = $this->authenticate();
        $response = $this->json('POST',route('admin.addMovie') , [
            'name' => 'Bloodshot',
            'desc' => 'Action',
            'rel' =>  $rel,
            'runtime' => 150,
            'image' => UploadedFile::fake()->image('movies_1234.jpg'),
            'year' => 2020,
            'category' => [3,5],
            'actors' => [3,5]
        ]);
        $response->assertStatus(401);

    }

    /**
     * @test
     * Test
     */

    public function getMovieForEditAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('GET',route('admin.getMovieEdit' , ['id' => 2]));
        $response->assertStatus(401);
    }


    /**
     * @test
     * Test
     */

    public function updateMovieAdminTest_IfUserIsNotAutentificated(){
        $response = $this->json('PUT',route('admin.updateMovie' , ['id' => 2]));
        $response->assertStatus(401);

    }

    /**
     * @test
     * Test
     */
    public function deleteMovieAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('DELETE',route('admin.deleteMovie' , ['id' => 7]) );
        $response->assertStatus(401);
    }

// Testiranje validacije podataka

    /**
     * @test
     * Test
     */

    public function addMovieAdminTest_WrongValidateDataTest(){
        $rel = '2020:12:28 14:00:00';
        //  $this->withoutExceptionHandling();
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->json('POST',route('admin.addMovie') , [
            'name' => 'Bloodshot',
            'desc' => 'Action',
            'rel' =>  $rel,
            'runtime' => 'number',
            'image' => UploadedFile::fake()->image('movies_1234.jpg'),
            'year' => 2020,
            'category' => [3,5],
            'actors' => [3,5]
        ]);
        $response->assertStatus(422);

    }

    /**
     * @test
     * Test
     */

    public function updateMovieAdminTest_WrongValidateDataTest(){
        $rel = '2020:12:28 14:00:00';
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->json('PUT',route('admin.updateMovie' , ['id' => 2]) , [
            'name' => 'Bloodshot',
            'desc' => 'Action',
            'rel' =>  'number',
            'runtime' => 150,
            'image' => UploadedFile::fake()->image('movies_1234.jpg'),
            'year' => 2020,
            'category' => [3,5],
            'actors' => [3,5]
        ]);
        $response->assertStatus(422);

    }
    /**
     * @test
     * Test
     */

    public function addMovieAdminTest_EmptyDataTest(){
        $rel = '2020:12:28 14:00:00';
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->json('POST',route('admin.addMovie') , [
            'name' => '',
            'desc' => '',
            'rel' =>  '',
            'runtime' => 0,
            'image' => '',
            'year' => 0,
            'category' => ['',''],
            'actors' => ['','']
        ]);
        $response->assertStatus(422);

    }

    /**
     * @test
     * Test
     */

    public function updateMovieAdminTest_EmptyDataTest(){
        $rel = '2020:12:28 14:00:00';
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->json('PUT',route('admin.updateMovie' , ['id' => 2]) , [
            'name' => '',
            'desc' => '',
            'rel' =>  '',
            'runtime' => 0,
            'image' => UploadedFile::fake()->image('movies_1234.jpg'),
            'year' => 0,
            'category' => ['',''],
            'actors' => ['','']
        ]);
        $response->assertStatus(422);

    }

    public function testDatabase()
    {

        $this->assertDatabaseHas('movies', [
            'name' => 'Bad boys for life'
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

        $this->mock('App\Contracts\MoviesContract');
    }

    public function mock($class)
    {
        $this->mock = \Mockery::mock($class);

        $this->app->instance($class, $this->mock);

        return $this->mock;
    }

    public function testGetMoviesContract()
    {
        $this->mock->shouldReceive('getMovies')->once();

        $response = $this->call('GET', '/api/moviess');
        $response->assertStatus(200);
    }


}
