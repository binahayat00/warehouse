<?php

namespace Tests\Unit\Services\Auth;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\Auth\JwtAuthService;
use Illuminate\Support\Facades\Artisan;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtAuthTest extends TestCase
{
    use RefreshDatabase;
    public $jwtAuthService;
    /**
     * Set up the test
     */
    public function setUp():void
    {
        parent::setUp();
        Artisan::call('db:seed');
        $this->jwtAuthService = new JwtAuthService();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_login()
    {
        $user = User::find(1);
        var_dump(config('settings.default.user.password'));
        $data = [
            'personnel_code' => $user->personnel_code,
            'password' => $user->password,
        ];

        $response = $this->jwtAuthService->login($data);
        var_dump($response['status']);
    }
}
