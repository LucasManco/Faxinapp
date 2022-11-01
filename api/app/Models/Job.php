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
        'address_id'
    ];
    
    function address(){
        $address = Address::find($this->address_id);
        return $address->street . ', ' . $address->number . " " . $address->city . ' ' . $address->state . '  ' . $address->postal_code; 
    }
}
