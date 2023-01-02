<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'transport_value',
        'charge_transport',
        'user_id',
        'description',
        'profile_image',
        'categories'

    ];

    public function getUser(){
        return $this->belongsTo(User::class,'user_id')->first();
    }
    public function jobType()
    {
        return $this->hasMany(JobType::class);
    }
    public function workdays()
    {
        return $this->hasMany(WorkDay::class, 'user_id');
    }
    public function updateScore()
    {
        $reviewList = Review::where('employee_id', $this->id)->get();
        $acumuledScore = 0;
        $reviewsCount = 0;
        
        foreach($reviewList as $review){
            $acumuledScore += $review->score;
            $reviewsCount++;
        }
        
        if($reviewsCount>0){
            $user = $this->getUser();
            $user->score = $acumuledScore / $reviewsCount;
            $user->save();
        }
    }
    public function reviews(){
        return $this->hasMany(Review::class, 'employee_id');
    }
}
