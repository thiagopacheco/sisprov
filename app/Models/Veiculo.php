<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
        'placa',
        'modelo',
        'ano',
        'marca'
    ];

    public function agendamento()
    {
        return $this->hasMany(Agendamento::class);
    }
}
