<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
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
        $validation = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ];
        if ($this->role != '') {
            $validationRole = [
                'role' => 'required|integer',
            ];
            $validation = array_merge($validationRole, $validation);
        }
        if ($this->permissions != '') {
            $validationPermissions = [
                'permissions' => 'required|array'
            ];
            $validation = array_merge($validationPermissions, $validation);
        }
        return $validation;
    }
}
