<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'user_id'
    ];
    public function city(){
        return $this->belongsTo(Cidade::class,'city_id')->first()->nome;
    }
    
    public function state(){
        return $this->belongsTo(Cidade::class,'city_id')->first()->state();
    }
}
