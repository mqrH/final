<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiDataTest extends TestCase
{
    /**
     * A basic feature test example.
     * @return void
     */
    public function testApiResponseStructure()
    {
        $response = $this->get('/api/data');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'data' => [
                    'id',
                    'name',
                    'description',
                ],
            ]);
    }
}
