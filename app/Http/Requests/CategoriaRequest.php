<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'categoria' => 'required|string|max:255',
            'portada' => 'nullable|url',
            'color' => 'nullable|string|max:10',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'categoria.required' => 'El campo categoría es requerido.',
            'categoria.max' => 'El campo categoría no debe exceder los :max caracteres.',
            'portada.url' => 'El campo portada debe ser una URL válida.',
            'color.max' => 'El campo color no debe exceder los :max caracteres.',
        ];
    }
}
