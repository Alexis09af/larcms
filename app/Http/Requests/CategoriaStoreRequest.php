<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required|unique:lc_categorias|max:255',
            'slug' => 'required|unique:lc_categorias|max:255'
        ];
    }

    //Mensajes de error
    public function messages(){

        return [
            'required' => 'Campo obligatorio',
        ];

    }
}
