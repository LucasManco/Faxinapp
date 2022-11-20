<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'price',
        'transport',
        'tax',
        'final_price',
        'start_time' ,
        'end_time' ,
        'status' ,
        'observation',
        'address_id',
        'job_type_id',
        'additionals',
        'user_id',
        'employee_id'
    ];
    
    function address(){
        $address = Address::find($this->address_id);
        return $address->street . ', ' . $address->number . " " . $address->city . ' ' . $address->state . '  ' . $address->postal_code; 
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }
    public function jobTypeAdditional()
    {
        $additionals_ids = json_decode($this->additionals);
        // dd($additionals_ids);
        $additionals = [];
        foreach ($additionals_ids as $additionals_id){
            $additionals[] = JobTypeAdditional::find($additionals_id);
        }
        return $additionals;
    }
}
