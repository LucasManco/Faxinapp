<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'street',
        'number',
        'city',
        'state',
        'postal_code',
        'country',
        'complement',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function becomeDefault(){
        $user = $this->user()->first(); 
        $user->default_address_id = $this->id;
        return $user->save();
    }
}
