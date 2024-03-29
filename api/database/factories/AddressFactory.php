<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\User;
use App\Models\Address;
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
        
        $city_obj = Cidade::find(rand(1, 9384));
        if($city_obj){
            $city = $city_obj->nome;
            
        }
        else{
            $city = $faker->streetName;
        }
        $state_obj = Estado::find($city_obj->estados_id);
        if($state_obj){
            $state = $state_obj->sigla;    
        }
        else{
            $state = $faker->stateAbbr;
        }
        
        return [
            'street' => $faker->streetName,
            'number' => $faker->buildingNumber,
            'city' => $city,
            'state' => $state,
            'postal_code' => $faker->postCode,
            'country' => 'Brasil',

        ];
    }
     /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Address $address) {
            
        })->afterCreating(function (Address $address) {
            $user = User::find($address->user_id);
            if($user->default_address_id == null){
                $user->default_address_id = $address->id;
                $user->save();
            }
        });
    }

}
