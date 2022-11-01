<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
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
        'nome',
        'estados_id'
    ];
    public function state(){
        return $this->belongsTo(Estado::class,'estados_id')->first()->nome;
    }
}
