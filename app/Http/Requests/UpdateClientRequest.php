<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'cpf' => $this->cpf ? preg_replace('/\D/', '', $this->cpf) : null,
            'phone' => $this->phone ? preg_replace('/\D/', '', $this->phone) : null,
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
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('clients')->ignore($this->client)],
            'cpf' => ['required', 'string', Rule::unique('clients')->ignore($this->client)],
            'phone' => 'nullable|string',
            'uf' => 'required|string|max:2',
            'city' => 'required|string|max:255',
            'zip_code' => 'required|string|max:9',
            'neighborhood' => 'required|string|max:255',
            'number' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'complement' => 'nullable|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser um texto.',
            'name.max' => 'O campo nome não pode ter mais que 255 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
            'email.unique' => 'O e-mail já está em uso.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.string' => 'O campo CPF deve ser um texto.',
            'cpf.unique' => 'O CPF já está em uso.',
            'phone.string' => 'O campo telefone deve ser um texto.',
            'uf.required' => 'O campo UF é obrigatório.',
            'uf.string' => 'O campo UF deve ser um texto.',
            'uf.max' => 'O campo UF não pode ter mais que 2 caracteres.',
            'city.required' => 'O campo cidade é obrigatório.',
            'city.string' => 'O campo cidade deve ser um texto.',
            'city.max' => 'O campo cidade não pode ter mais que 255 caracteres.',
            'zip_code.required' => 'O campo CEP é obrigatório.',
            'zip_code.string' => 'O campo CEP deve ser um texto.',
            'zip_code.max' => 'O campo CEP não pode ter mais que 9 caracteres.',
            'neighborhood.required' => 'O campo bairro é obrigatório.',
            'neighborhood.string' => 'O campo bairro deve ser um texto.',
            'neighborhood.max' => 'O campo bairro não pode ter mais que 255 caracteres.',
            'number.required' => 'O campo número é obrigatório.',
            'number.string' => 'O campo número deve ser um texto.',
            'number.max' => 'O campo número não pode ter mais que 10 caracteres.',
            'address.required' => 'O campo endereço é obrigatório.',
            'address.string' => 'O campo endereço deve ser um texto.',
            'address.max' => 'O campo endereço não pode ter mais que 255 caracteres.',
            'complement.string' => 'O campo complemento deve ser um texto.',
            'complement.max' => 'O campo complemento não pode ter mais que 255 caracteres.',
        ];
    }
}
