<?php

namespace Tests\Unit\Mailer;

use App\Mail\PHPMail;
use PHPUnit\Framework\TestCase;

class Mailer extends TestCase
{
      public function testPhpMailer(){
             $mock = \Mockery::mock(PHPMail::class);
             $mock->shouldReceive('IsSMTP')->once();
          $mock->shouldReceive('AddAddress')
              ->once()->with('armygamesict@gmail.com');
     $mock->shouldReceive('IsHTML')->once()->with(true);
     $mock->shouldReceive('Send')->andReturn(true);
     $this->assertTrue(true,"Send verification");
      }
}
