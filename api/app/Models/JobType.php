<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'description','price','time','user_id'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
    public function jobTypeAdditional()
    {
        return $this->hasMany(JobTypeAdditional::class);
    }
}
