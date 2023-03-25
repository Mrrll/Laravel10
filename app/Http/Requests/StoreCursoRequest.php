<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCursoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:150',
            'description' => 'required|min:5',
            'categoria' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'nombre del curso'
        ];
    }
    public function messages()
    {
        return [
            'description.required' => 'Debe de ingresar una descripción del curso.'
        ];
    }
}
