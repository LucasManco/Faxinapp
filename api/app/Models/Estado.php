<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    /**
     * Model Cidade e Estados não possui migration 
     * script sql importado do projeto: 
     * https://github.com/egermano/cidades-e-estados-brasileiros
     */
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
}
