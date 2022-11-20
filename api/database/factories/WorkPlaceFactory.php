<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class WorkPlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        /**
         * Serra = 1917
         * Vitoria = 1936
         * Vila Velha = 1932
         */
        $city_array = [1917,1936,1932];
        
        return [
            'city_id' => $city_array[rand(0, 2)]
        ];
    }
}
