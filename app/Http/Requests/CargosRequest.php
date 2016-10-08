<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CargosRequest extends Request
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
        if($this->method() == 'PUT'){
            $nome_rule = 'required|unique:cargos,nome,'.$this->id;
        }else{
            $nome_rule = 'required|unique:cargos,nome';
        }
        return [
            'nome'=> $nome_rule,
        ];
    }
}
