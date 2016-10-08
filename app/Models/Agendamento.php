<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamentos';

    protected $fillable = [
        'veiculo_id',
        'motorista',
        'servidores',
        'municipios',
        'data_saida',
        'data_retorno',
        'hora_saida',
        'cod_siad',
        'status',
        'descricao'
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
}
