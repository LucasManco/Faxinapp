<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Address;
use \App\Models\Employee;
use App\Models\JobType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory(10)
                ->has(Address::factory()->count(2))
                ->has(Employee::factory()->count(1))
                ->has(JobType::factory()->count(1)->state([
                    'name' => 'Faxina Basica',
                    'description' => 'Como o próprio nome já entrega, é aquela mais “básica”. Consiste em retirar pó e outros resíduos com produtos de higienização mais acessíveis.',
                    'price' => 30,
                    'time' => 120,
                ]))
                ->has(JobType::factory()->count(1)->state([
                    'name' => 'Faxina Pesada',
                    'description' => 'Essa limpeza está um patamar acima da geral. Também chamada de serviço de higienização, já demanda a utilização de materiais químicos mais específicos e pesados, tais como água sanitária e solventes.',
                    'price' => 60,
                    'time' => 240,
                ]))
                ->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
