<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersRequest extends Request
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
            $email_rule = 'required|email|unique:users,email,'.$this->id;
            $password_rule = '';
        }else{
            $email_rule = 'required|email|unique:users,email';
            $password_rule = 'required|confirmed';
        }
        return [
            'nome'=> 'required',
            'email' => $email_rule,
            'password' => $password_rule
        ];
    }
}
