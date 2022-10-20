<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');

        return [
            'street' => $faker->streetName,
            'number' => $faker->buildingNumber,
            'city' => $faker->city,
            'state' => $faker->stateAbbr,
            'postal_code' => $faker->postCode,
            'country' => 'Brasil',

        ];
    }
}
