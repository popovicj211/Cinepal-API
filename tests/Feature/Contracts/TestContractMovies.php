<?php

namespace Tests\Feature\Contracts;

use App\Contracts\ActorsContract;
use App\Contracts\MoviesContract;
use App\Helpers\ImageResize;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\SlidesController;
use App\Http\Requests\PaginateRequest;
use App\Services\ActorsService;
use App\Services\MoviesService;
use App\Services\SlidesService;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
//use Mockery;
class TestContractMovies extends TestCase
{
   use MockeryPHPUnitIntegration;



    public function testMethodsInCotrollerSlides(){
        $mock = \Mockery::mock('SlidesController');
        $spy = \Mockery::spy('SlidesController');

        $mock->shouldReceive('getAllSlides')->andReturn(42);

        $mockResult = $mock->getAllSlides();
        $spyResult = $spy->getAllSlides();

        $spy->shouldHaveReceived()->getAllSlides();

        var_dump($mockResult); // int(42)
        var_dump($spyResult); // null

    }


    public function testMethodsInCotrollerActors(){

        $mock = \Mockery::mock('ActorsController');
        $spy = \Mockery::spy('ActorsController');

        $mock->shouldReceive('getAllActors')->andReturn(array(1,2,3));

        $mockResult = $mock->getAllActors();
        $spyResult = $spy->getAllActors();

        $spy->shouldHaveReceived()->getAllActors();

        var_dump($mockResult);
       var_dump($spyResult);

    }


    public function testMethodsInCotroller(){

        $mock = \Mockery::mock('ActorsController');
        $spy = \Mockery::spy('ActorsController');

        $mock->shouldReceive('getAllActors')->andReturn(42);

        $mockResult = $mock->getAllActors();
        $spyResult = $spy->getAllActors();

        $spy->shouldHaveReceived()->getAllActors();

        var_dump($mockResult); // int(42)
        var_dump($spyResult); // null

    }



    /**
     * @test
     * Test
     */


public function er(){



}


}
