<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // if ($this->user_id == auth()->user()->id) {
        //     return true;
        // } else {
        //     return false;
        // }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $validation = [
            'title' => 'required|max:45',
            'slug' => 'required|max:45',
            'body' => 'required|min:5',
            'category_id' => 'required|integer',
            'user_id' => 'required|integer',
            'image' => 'mimes:jpg,png,jpeg,gif,bmp',
            'tags' => 'string'
        ];
        if ($this->published != '') {
            $validationPublished = [
                'published' => 'required|date',
            ];
            $validation = array_merge($validationPublished, $validation);
        }
        return $validation;
    }
    public function messages()
    {
        return [
            'category_id.integer' => 'Debe de seleccionar una categoría.',
        ];
    }
    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->published != '') {
            $this->merge([
                'published' => Carbon::now('Europe/Madrid'),
            ]);
        }
    }
}
