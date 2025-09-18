<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_can_create_a_product()
    {
        $payload = [
            'name' => 'Test Product',
            'price' => 100.50,
            'stock' => 10,
        ];
        $response = $this->postJson('/api/products', $payload);
            $response->assertStatus(201)
            ->assertJsonFragment([
                'name' => 'Test Product',
                'price' => 100.50,
                'stock' => 10,
            ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'price' => 100.50,
            'stock' => 10,
        ]);
    }
}
