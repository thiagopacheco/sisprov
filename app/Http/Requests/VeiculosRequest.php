<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VeiculosRequest extends Request
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
            $placa_rule = 'required|min:8|max:8|unique:veiculos,placa,'.$this->id;
        }else{
            $placa_rule = 'required|min:8|max:8|unique:veiculos,placa';
        }
        return [
            'placa'=> $placa_rule,
            'ano'=> 'integer'
        ];
    }
}
