<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaUpdateRequest extends FormRequest
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
            'titulo' => 'required|max:255|unique:lc_categorias,titulo,' . $this->route('categoria'),
            'slug'  => 'required|max:255|unique:lc_categorias,slug,' . $this->route('categoria'),
        ];
    }

    //Mensajes de error
    public function messages(){

        return [
            'required' => 'Campo obligatorio',
        ];

    }
}
