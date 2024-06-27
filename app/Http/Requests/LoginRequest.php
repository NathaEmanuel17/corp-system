<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'     =>  ['required', 'email', 'exists:users,email'],
            'password'  =>  ['required', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.exists'   => 'Este email não existe.',
            'email.required' => 'O campo email é obrigatório.',
            'password.required'   => 'Informe a senha.',
            'password.min' => 'O campo senha deve ter no minino 8 caracteres.',

        ];
    }
}
