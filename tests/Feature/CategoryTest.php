<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
private static $subCat = 1;
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



    // Testiranje - uzimanje podataka za prikaz kategorije

    /**
     * @test
     * Test
     */

    public function getCategoriesTest(){
        $response = $this->json('GET',route('categories' , ['id' => 1]));
        $response->assertStatus(200);
    }

    /**
     * @test
     * Test
     */

    public function getCategoryTest(){
        $response = $this->json('GET',route('category' , [ 'cat' => 1, 'id' => 3]));
        $response->assertStatus(200);
    }

// Testiranje CRUD-a ketegorije za admin panel ako je korisnik autorizovan



    /**
     * @test
     * Test
     */

    public function getCategoriesAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET',route('admin.getCategories' , [ 'id' => 1]));
        $response->assertStatus(200);

    }
    /**
     * @test
     * Test
     */

    public function addCategoryAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addCategory') , [
            'catName' => 'ActionTesting' ,
            'subCat' => self::$subCat
        ]);
        $response->assertStatus(201)->assertExactJson([
            'message' => "Category is successfully added",
        ]);

    }


    /**
     * @test
     * Test
     */

    public function getCategoryForEditAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('GET',route('admin.getCategoryEdit' , ['cat'=> 3 , 'id' => 1 ]) );
        $response->assertStatus(200);

    }

    /**
     * @test
     * Test
     */

    public function updateCategoryAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateCategory' , ['cat'=> 1 , 'id' => 3 ]) , [
            'catName' => 'ActionTesting' ,
            'subCat' => self::$subCat
        ] );
        $response->assertStatus(204);

    }

    /**
     * @test
     * Test
     */

    public function deleteCategoryAdminTest_IfUserIsAutentificated(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('DELETE',route('admin.deleteCategory' , ['cat'=> 1 , 'id' => 3 ]));
        $response->assertStatus(204);

    }

    // Testiranje CRUD-a slideshow-a za admin panel ako korisnik nije autorizovan



    /**
     * @test
     * Test
     */

    public function getCategoriesAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('GET',route('admin.getCategories' , [ 'id' => 1]));
        $response->assertStatus(401);

    }
    /**
     * @test
     * Test
     */

    public function addCategoryAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('POST',route('admin.addCategory') , [
            'catName' => 'ActionTesting' ,
            'subCat' => self::$subCat
        ]);
        $response->assertStatus(401);

    }


    /**
     * @test
     * Test
     */

    public function getCategoryForEditAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('GET',route('admin.getCategoryEdit' , ['cat'=> 3 , 'id' => 1 ]) );
        $response->assertStatus(401);
    }

    /**
     * @test
     * Test
     */

    public function updateCategoryAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('PUT',route('admin.updateCategory' , ['cat'=> 1 , 'id' => 3 ]) , [
            'catName' => 'ActionTesting' ,
            'subCat' => self::$subCat
        ] );
        $response->assertStatus(401);
    }

    /**
     * @test
     * Test
     */

    public function deleteCategoryAdminTest_IfUserIsNotAutentificated(){

        $response = $this->json('DELETE',route('admin.deleteCategory' , ['cat'=> 1 , 'id' => 3 ]));
        $response->assertStatus(401);

    }

// Testiranje validacije podataka

    /**
     * @test
     * Test
     */

    public function addCategoryAdminTest_WrongValidateData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addCategory') , [
            'catName' => 'ActionTesting' ,
            'subCat' => 'Aaaa'
        ]);
        $response->assertStatus(422);

    }

    /**
     * @test
     * Test
     */

    public function updateCategoryAdminTest_WrongValidateData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateCategory' , ['cat'=> 1 , 'id' => 3 ]) , [
            'catName' => 'ActionTesting' ,
            'subCat' => 'Aaaa'
        ] );
        $response->assertStatus(422);

    }



    /**
     * @test
     * Test
     */

    public function addCategoryAdminTest_EmptyData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST',route('admin.addCategory') , [
            'catName' => '' ,
            'subCat' => ''
        ]);
        $response->assertStatus(422);

    }

    /**
     * @test
     * Test
     */

    public function updateCategoryAdminTest_EmptyData(){

        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT',route('admin.updateCategory' , ['cat'=> 1 , 'id' => 3 ]) , [
            'catName' => '' ,
            'subCat' => ''
        ] );
        $response->assertStatus(422);

    }


    // Testiranje tabele baze podataka da li postoji

    public function testDatabase()
    {

        $this->assertDatabaseHas('categories', [
            'name' => 'Action'
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

        $this->mock('App\Contracts\CategoriesContract');
    }

    public function mock($class)
    {
        $this->mock = \Mockery::mock($class);

        $this->app->instance($class, $this->mock);

        return $this->mock;
    }

    public function testGetCategoriesContract()
    {
        $this->mock->shouldReceive('getAllCategories')->once();

        $response = $this->call('GET', '/api/categories/1');
        $response->assertStatus(200);
    }

}
