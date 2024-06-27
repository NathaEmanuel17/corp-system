<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user)],
            'cpf' => ['required', 'string', 'size:11', Rule::unique('users', 'cpf')->ignore($this->user)],
            'cellphone' => ['nullable', 'size:11'],
            'role' => ['required', 'in:admin,manage,user'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
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
            'cpf.size' => 'O campo CPF deve ter 11 caracteres.',
            'cpf.unique' => 'Este CPF já está em uso.',
            'cellphone.size' => 'O campo telefone celular deve ter 11 caracteres.',
            'role.required' => 'O campo tipo de usuário é obrigatório.',
            'role.in' => 'Selecione um tipo de usuário válido (Admin, Gerente, Usuário).',
            'password.min' => 'A nova senha deve ter pelo menos 8 caracteres.',
            'password.confirmed' => 'As senhas não coincidem.',
            'photo.image' => 'O arquivo deve ser uma imagem.',
            'photo.mimes' => 'A imagem deve estar no formato: jpeg, png, jpg.',
            'photo.max' => 'A imagem não deve ser maior que 2MB.',
        ];
    }
}
