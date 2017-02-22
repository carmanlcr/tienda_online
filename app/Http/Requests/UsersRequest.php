<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required|max:20|min:3',
            'last_name' => 'required|max:20|min:5',
            'email' => 'required|email|min:5|max:100|unique:users',
            'username' => 'required|min:5|max:40|unique:users',
            'password' => 'required|min:8|confirmed',
            'type' => 'in:SuperUsuario,Administrador,Invitado',
            'direccion' => 'required|max:1000'
        ];
    }
}
