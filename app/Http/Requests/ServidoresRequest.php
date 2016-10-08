<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class ServidoresRequest extends Request
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
    public function rules(\Illuminate\Http\Request $request)
    {
        if($this->method() == 'PUT'){
            $role_cpf = "numeric|digits:11|unique:servidores,cpf,{$request->get('id')}";
        }else{
            $role_cpf = 'numeric|digits:11|unique:servidores,cpf';
        }
        return [
            'nome'=> 'required',
            'cpf'=> $role_cpf,
            'nucleo' => 'required',
            'cargo_id' => 'required'
        ];
    }
}
