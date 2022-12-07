<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');

        $categories = ['Diarista','Limpeza de Piscina','Passadeira','Lavadeira', 'Cozinheira'];
        
        return [
            'charge_transport' => false,
            'transport_value' => 0,
            'description' => $faker->realText(180),
            'profile_image' => "/images/profile/" . rand(1,20) . ".jpg",
            'categories' => json_encode([$categories[rand(0,count($categories)-1)],$categories[rand(0,count($categories)-1)]]),
        ];
    }
}
