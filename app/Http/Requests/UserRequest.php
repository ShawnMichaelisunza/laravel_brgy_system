<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'profile' => ['required', 'mimes:png,jpg'],
            'address' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'address' => ['required'],
            'password' => ['required', 'confirmed']
        ];
    }
}
