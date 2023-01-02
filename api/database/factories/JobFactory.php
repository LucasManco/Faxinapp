<?php

namespace Database\Factories;
use App\Models\Job;
use App\Models\JobType;
use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobType>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'price' => 0,
            'transport' => 0,
            'tax' => 0,
            'final_price' => 0,
            'start_time' => '',
            'end_time' => '',
            'status' => 'requested',
            'observation' => '',
            'address_id' => '',
            'additionals' => '',
            'user_id' => 0,
            'employee_id' => 0
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Job $job) {
            $TAX_PERCENTAGE = 0;
            $user = User::all()->random();

            $jobType = JobType::find($job->job_type_id);
            $price = $jobType->price;
            $transport = $jobType->employee()->first()->transport_value;
            $tax = $price * $TAX_PERCENTAGE;
            $start_time = strtotime('now');
            $end_time = $start_time + $jobType->time*60;

            $job->price = $price;
            $job->transport = $transport;
            $job->tax = $tax;
            $job->final_price = $price + $transport + $tax;
            $job->start_time = date("Y-m-d H:i:s", $start_time);
            $job->end_time = date("Y-m-d H:i:s", $end_time);
            $job->address_id = $user->default_address_id;
            
            $job->employee_id = $jobType->user_id;
            $job->user_id = $user->id;
            $job->additionals = json_encode([]);
        })->afterCreating(function (Job $job) {
            $job->status = 'done';
        
            Review::factory()->create([
                'job_id' => $job->id,
                'user_id' => $job->user_id,
                'employee_id' => $job->employee_id,
            ]);
            
            $job->employee()->first()->updateScore();
            
            $job->save();
        });
    }

}
