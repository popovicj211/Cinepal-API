<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{

    /**
     * @test
     * Test
     */

   public function browserLoginTest(){

           $this->browse(function ($browser) {
               $browser->visit('/login')->clickLink('sendLogin')->assertSee("Here is my response");
           });

   }





}
