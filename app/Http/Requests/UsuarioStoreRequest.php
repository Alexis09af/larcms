<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioStoreRequest extends FormRequest
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
            'nombre' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ];
    }

    //Mensajes de error
    public function messages(){

        return [
            'required' => 'Campo obligatorio',
            'confirmed' => 'La contraseña no coincide',
            'email' => 'Formato: nombre@dominio.ext'

        ];

    }
}
