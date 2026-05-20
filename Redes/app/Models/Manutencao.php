<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manutencao extends Model
{
    protected $fillable = [
        'hardware_id', 'tipo', 'manutencao', 'descricao','responsavel'
    ];

    protected $casts = [
        'manutencao' => 'date'
    ];

    public function hardware()
    {
        return $this->belongsTo(Hardware::class);
    }
}