<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'cpf' => $this->cpf ? preg_replace('/\D/', '', $this->cpf) : null,
            'cellphone' => $this->cellphone ? preg_replace('/\D/', '', $this->cellphone) : null,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:10', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email'],
            'cpf' => ['required', 'string', 'min:11', 'max:11', 'unique:users,cpf'],
            'cellphone' => ['nullable', 'min:11', 'max:11'],
            'role' => ['required', 'in:admin,manage,user'],
            'password_confirmation' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O campo nome deve ter pelo menos 10 caracteres.',
            'name.max' => 'O campo nome não pode ter mais de 50 caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Digite um endereço de email válido.',
            'email.unique' => 'Este email já está em uso.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.min' => 'O campo CPF deve ter 11 caracteres.',
            'cpf.max' => 'O campo CPF deve ter 11 caracteres.',
            'cpf.unique' => 'Este CPF já está em uso.',
            'cellphone.min' => 'O campo telefone celular deve ter 11 caracteres.',
            'cellphone.max' => 'O campo telefone celular deve ter 11 caracteres.',
            'role.required' => 'O campo tipo de usuário é obrigatório.',
            'role.in' => 'Selecione um tipo de usuário válido (Admin, Gerente, Usuário).',
            'password_confirmation.required' => 'O campo senha atual é obrigatório.',
            'password.required' => 'O campo nova senha é obrigatório.',
            'password.min' => 'A nova senha deve ter pelo menos 8 caracteres.',
            'password.confirmed' => 'As senhas não coincidem.'
        ];
    }
}
