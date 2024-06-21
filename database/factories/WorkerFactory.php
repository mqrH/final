<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WorkerFactory extends Factory
{
    protected $model = \App\Models\Worker::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'avatar' => fake()->imageUrl,
            'bio' => fake()->sentence,
        ];
    }
}
