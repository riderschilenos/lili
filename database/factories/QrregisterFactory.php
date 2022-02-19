<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class QrregisterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'slug'=>Str::random(10),
            'nro'=>$this->faker->numberBetween($min = 100000, $max = 999999),
            'pass'=>$this->faker->numberBetween($min = 1000, $max = 9999)

        ];
    }
}
