<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
    protected $table = 'servidores';

    protected $fillable = [
        'nome',
        'cpf',
        'nucleo',
        'telefone',
        'cargo_id'
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
}
