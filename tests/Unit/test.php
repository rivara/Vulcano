<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;


class test extends TestCase
{
    /**
     * A basic unit test example. testing value inside the web
     */
    public function test_example(): void
    {
          $response = Http::get('http://127.0.0.1:8000/api/');
          $response->assertOk();
          $response->assertSee('sunt aut facere repellat provident occaecati excepturi optio reprehenderit');
  
    }


    
}
