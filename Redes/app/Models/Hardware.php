<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    protected $table = 'hardware';

    protected $fillable = [
        'estoque_id',
        'nome',
        'ip',
        'mac',
        'status',
        'ultima_manutencao'
    ];

    public function estoque()
    {
        return $this->belongsTo(Estoque::class);
    }

    public function manutencoes()
    {
        return $this->hasMany(Manutencao::class);
    }
}