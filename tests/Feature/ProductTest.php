<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        Artisan::call('passport:install');
        $user = User::factory()->make();
        Passport::actingAs($user);
        $token = $user->generateToken();
        $headers = [ 'Authorization' => "Bearer $token"];
        $payload = [];

        $response = $this->json('GET', '/api/product/list', $payload, $headers);

        $response->assertStatus(200);
    }

    public function test_example2()
    {
        Artisan::call('passport:install');
        $user = User::factory()->make();
        Passport::actingAs($user);
        $token = $user->generateToken();
        $headers = [ 'Authorization' => "Bearer $token"];
        $payload = [];
        $data = Product::inRandomOrder()->first();

        $response = $this->json('GET', '/api/product/'. $data->id, $payload, $headers);

        $response->assertStatus(200);
    }

    public function test_example3()
    {
        Artisan::call('passport:install');
        $user = User::factory()->make();
        Passport::actingAs($user);
        $token = $user->generateToken();
        $headers = [ 'Authorization' => "Bearer $token"];
        $payload = [
            'name' => 'Burger',
            'description' => 'Most Delicious Burger.',
            'price' => '10.99'
        ];

        $response = $this->json('POST', '/api/product/create', $payload, $headers);

        $response->assertStatus(200);
    }
}
