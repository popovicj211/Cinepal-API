<?php

namespace Tests;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication , DatabaseTransactions;
//use CreatesApplication , DatabaseMigrations;

    protected $faker;

    public function setUp(): void {
        parent::setUp();
    }



}
