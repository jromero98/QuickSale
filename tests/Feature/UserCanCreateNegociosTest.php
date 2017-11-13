<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserCanCreateNegociosTest extends TestCase
{
    // /**
    //  * A basic test example.
    //  * @test
    //  * @return void
    //  */
    // public function UserCanCreateNegociosTest()
    // {
    // 	$this->browse(function ($browser) {
    //         $browser->visit('negocio')
    //     	->type('D1','nombre')
    //     	->type('Calle falsa 123','direccion')
    //     	->type('867 27 00','telefono')
    //     	->press('guardar')
    //     	->seePageIs('perfil')
    //     	->click('D1')
    //     	->see('D1');
    //     });
    // }
     public function testBasicTest()
    {
        $this->assertTrue(true);
    }
}
