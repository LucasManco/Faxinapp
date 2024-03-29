<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'phone_number',
        'favorites'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isEmployee(){
        return boolval($this->hasOne(Employee::class)->first());
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
    public function jobType()
    {
        return $this->hasOne(JobType::class);
    }
    public function workPlace()
    {
        return $this->hasMany(WorkPlace::class, 'user_id');
    }

}
