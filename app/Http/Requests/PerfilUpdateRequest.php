<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilUpdateRequest extends FormRequest
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
            'email'    => 'email|required|unique:users,email,' . auth()->user()->id,
            'password' => 'required_with:password_confirmation|confirmed',
            'slug'     => 'required|unique:users,slug,' . auth()->user()->id,
            'role' => 'required'
        ];
    }

    //Mensajes de error
    public function messages(){

        return [
            'required' => 'Campo obligatorio',
            'confirmed' => 'La contraseña no coincide',
        ];

    }
}
