<?php

namespace Tests\Unit;

use Tests\TestCase;


class teUnitTest extends TestCase
{
    /** @test */
    public function test_examtest_route_returns_ok()
    {
        $response = $this->get('http://127.0.0.1:8000/api/');
        $response->assertStatus(200);
        $response->assertSee('qui est esse');
        $response->assertDontSee('Beta');
  
    }


    
}
