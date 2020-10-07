<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

class TestModel extends TestCase
{
    use MockeryPHPUnitIntegration;

    // Testiranje modela

    public function testMockModelUsers(){
        $mock = \Mockery::mock('overload:User');
        $mock->shouldReceive('save')->once()->andReturn(true);

    }

    public function testMockModelActors(){
        $mock = \Mockery::mock('overload:Actors');
        $mock->shouldReceive('save')->once()->andReturn(true);

    }

    public function testMockModelMovies(){
        $mock = \Mockery::mock('overload:Movies');
        $mock->shouldReceive('save')->once()->andReturn(true);

    }

    public function testMockModelRole(){
        $mock = \Mockery::mock('overload:Role');
        $mock->shouldReceive('save')->once()->andReturn(true);

    }

    public function testMockModelCategories(){
        $mock = \Mockery::mock('overload:Categories');
        $mock->shouldReceive('save')->once()->andReturn(true);

    }

    public function testMockModelReservation(){
        $mock = \Mockery::mock('overload:Reservation');
        $mock->shouldReceive('save')->once()->andReturn(true);

    }

    public function testMockModelSeat(){
        $mock = \Mockery::mock('overload:Seat');
        $mock->shouldReceive('save')->once()->andReturn(true);

    }

    public function testMockContact(){
        $mock = \Mockery::mock('overload:Contact');
        $mock->shouldReceive('save')->once()->andReturn(true);

    }

    public function testMockPricelists(){
        $mock = \Mockery::mock('overload:Pricelists');
        $mock->shouldReceive('save')->once()->andReturn(true);

    }




    public function testMockSlides(){
        $mock = \Mockery::mock('overload:Slides');
        $mock->shouldReceive('save')->once()->andReturn(true);

    }



}
