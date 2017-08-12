<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioUpdateRequest extends FormRequest
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
        // @todo arreglar cuando updateas un usuario
        return [
            'nombre' => 'required',
            'email'    => 'email|required|unique:users,email,' . $this->route("users"),
            'password' => 'required_with:password_confirmation|confirmed',
            'slug'     => 'required|unique:users,slug,' . $this->route("users"),
            'role' => 'required'
        ];
    }

    //Mensajes de error
    public function messages(){

        return [
            'required' => 'Campo obligatorio',
            'confirmed' => 'La contraseña no coincide',
            'unique' => 'Campo ya utilizado por otro usuario'
        ];

    }
}
