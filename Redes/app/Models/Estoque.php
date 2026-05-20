<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $fillable = [
        'nome',
        'tipo',
        'voltagem',
        'quantidade',
        'estoque_minimo'
    ];

    public function hardwares()
    {
        return $this->hasMany(Hardware::class);
    }
}