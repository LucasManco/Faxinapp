<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Address;
use \App\Models\Employee;
use App\Models\Job;
use App\Models\JobType;
use App\Models\WorkPlace;
use App\Models\WorkDay;
use App\Models\JobTypeAdditional;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory(11)
                ->has(Address::factory()->count(2))
                ->has(Employee::factory()->count(1)
                    ->has(WorkDay::factory()->count(1)->state([
                        'week_day' => 1,
                        'start' => '08:00',
                        'end' => '18:00'
                    ]))
                    ->has(WorkDay::factory()->count(1)->state([
                        'week_day' => 2,
                        'start' => '08:00',
                        'end' => '18:00'
                    ]))
                    ->has(WorkDay::factory()->count(1)->state([
                        'week_day' => 3,
                        'start' => '08:00',
                        'end' => '18:00'
                    ]))
                    ->has(WorkDay::factory()->count(1)->state([
                        'week_day' => 4,
                        'start' => '09:00',
                        'end' => '17:00'
                    ]))
                    ->has(WorkDay::factory()->count(1)->state([
                        'week_day' => 5,
                        'start' => '08:00',
                        'end' => '18:00'
                    ]))
                )
                ->has(JobType::factory()->count(1)->state([
                    'name' => 'Faxina Basica',
                    'description' => 'Como o próprio nome já entrega, é aquela mais “básica”. Consiste em retirar pó e outros resíduos com produtos de higienização mais acessíveis.',
                    'price' => 30,
                    'time' => 120,
                    ])->has(JobTypeAdditional::factory()->count(1)->state([
                        'name' => 'Lavar Roupa',
                        'description' => '',
                        'price' => 30,
                        'time' => 120,
                    ]))->has(JobTypeAdditional::factory()->count(1)->state([
                        'name' => 'Limpeza de Janelas',
                        'description' => '',
                        'price' => 20,
                        'time' => 45,
                    ]))->has(JobTypeAdditional::factory()->count(1)->state([
                        'name' => 'Limpeza de Estofados',
                        'description' => '',
                        'price' => 80,
                        'time' => 120,
                    ]))->has(JobTypeAdditional::factory()->count(1)->state([
                        'name' => 'Fazer Comida',
                        'description' => '',
                        'price' => 10,
                        'time' => 45,
                    ]))
                )
                ->has(JobType::factory()->count(1)->state([
                    'name' => 'Faxina Pesada',
                    'description' => 'Essa limpeza está um patamar acima da geral. Também chamada de serviço de higienização, já demanda a utilização de materiais químicos mais específicos e pesados, tais como água sanitária e solventes.',
                    'price' => 60,
                    'time' => 240,
                ])
                    ->has(Job::factory()->count(5))
                )
                ->has(WorkPlace::factory()->count(1))
                ->create();

        
        \App\Models\User::factory()
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
                ->create([
                    'name' => 'Lucas Manço de Souza',
                    'email' => 'lucasmancosouza@gmail.com',
                    'password' => Hash::make('Kendashi12.'),
                    'cpf' => '12063300666'
                ]);
    }
}
