<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        //Obligamos a que estos elementos del formulario sean obligatorios
        $rules =
            [
                'titulo' => 'required',
                'slug' => 'required|unique:lc_posts',
                'body' => 'required',
                'categoria_id' => 'required',
                'published_at' => 'required|date_format:Y-m-d H:i:s',
                'image' => 'mimes:jpg,jpeg,bmp,png'
            ];

        switch($this->method()){
            case 'PUT':
            case 'PATCH':
                $rules['slug'] = 'required|unique:lc_posts,slug,'.$this->route('blog');
                default:break;
        }
        return $rules;
    }

    //Mensajes de error
    public function messages(){

        return [
            'required' => 'Campo obligatorio',
            'date_format' => 'formato incorrecto (Y-m-d H:m:s)',
            'mimes' => 'Formatos: jpg, jpeg, bmp, png'
        ];

    }
}



