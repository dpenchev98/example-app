<?php

namespace Database\Factories;

use App\Models\Clients;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clients::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            return [
                'name' => $this->faker->name(),
                'age' => $this->faker->numberBetween(12,80),
                'gender' => $this->faker->randomElement(['Male','Female']),
        ];
    }
}
