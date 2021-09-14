<?php

namespace Database\Factories;

use App\Models\Bolo;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bolo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->firstName,
            'peso' => $this->faker->randomFloat(2,10,60),
            'valor' => $this->faker->randomFloat(2,10,60)
        ];
    }
}
