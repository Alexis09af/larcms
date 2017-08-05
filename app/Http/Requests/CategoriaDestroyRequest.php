<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Si es la categoría con ID = 1 (representa sin categoria) haremos que no se pueda borrar.
        return !($this->route('categoria') == config('cms.default_categoria_id'));
    }

        /*Sobrecargamos el metodo para mostrar la prohibición*/
    public function forbiddenResponse()
    {
        return redirect()->back()->with('error-mensaje', 'No puedes eliminar la categoría por defect!');
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
