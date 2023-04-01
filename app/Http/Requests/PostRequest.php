<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user_id == auth()->user()->id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:45' ,
            'body' => 'required|min:5',
            'category_id' => 'required|integer',
            'user_id' => 'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'category_id.integer' => 'Debe de seleccionar una categoría.'
        ];
    }
}
