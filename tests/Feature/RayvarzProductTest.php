<?php

namespace Tests\Feature;

use App\Services\Rayvarz\AuthService;
use App\Services\Rayvarz\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RayvarzProductTest extends TestCase
{
    // /**
    //  * A basic feature test example.
    //  *
    //  * @return void
    //  */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /**
     * test get products
     * 
     * @ return void
     */
    public function testGetProducts(){
        
        $response = (new ProductService)->getLastProducts();
        //var_dump([/*$response->json()[0],*/$response->ok(),$response->status(),$response->headers()]);die;
        $this->assertNotEquals($response,null);
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testGetToken(){
        $response = AuthService::getToken();
        // var_dump($response->json());die;
        //$this->assertEquals($response->ok(),true);
        $this->assertEquals(is_string($response),true);
    }
}
