<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AgendamentosRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'servidores'=> 'required',
            'municipios'=> 'required',
            'data_saida' => 'required',
            'data_retorno' => 'required',
            'hora_saida' => 'required'
        ];
    }
}
