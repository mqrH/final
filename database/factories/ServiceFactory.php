<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = \App\Models\Service::class;

    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Haircut', 'Shave', 'Beard Trim', 'Hair Coloring', 'Manicure', 'Pedicure',
                'Facial', 'Massage', 'Waxing', 'Threading', 'Makeup'
            ]),
            'price' => fake()->numberBetween(100, 200),
            'duration' => fake()->numberBetween(30, 90),
        ];
    }
}
