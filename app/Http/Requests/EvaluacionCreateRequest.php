<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluacionCreateRequest extends FormRequest
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

            'motivo1' => 'required',
            'gestion1' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'motivo1.required' => 'El Motivo es un campo es obligatorio.',
            'gestion1.required' => 'Añade una gestion en el campo de Gestion 1',

        ];
    }
}
