<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
    protected function prepareForValidation()
    {
        // Remover qualquer formatação do campo price (ex: máscara de dinheiro)
        $this->merge([
            'price' => str_replace(',', '.', str_replace('.', '', $this->price))
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
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'photos' => 'required|array|max:3',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O nome do produto é obrigatório.',
            'name.string' => 'O nome do produto deve ser um texto.',
            'name.max' => 'O nome do produto não pode ter mais que 255 caracteres.',
            'price.required' => 'O preço do produto é obrigatório.',
            'price.numeric' => 'O preço do produto deve ser um número.',
            'price.min' => 'O preço do produto deve ser no mínimo 0.',
            'stock.required' => 'O estoque do produto é obrigatório.',
            'stock.integer' => 'O estoque do produto deve ser um número inteiro.',
            'stock.min' => 'O estoque do produto deve ser no mínimo 0.',
            'photos.required' => 'É necessário selecionar pelo menos uma imagem.',
            'photos.array' => 'As imagens devem ser enviadas como um array.',
            'photos.max' => 'Não é permitido mais do que 3 imagens.',
            'photos.*.required' => 'Cada foto é obrigatória.',
            'photos.*.image' => 'Cada foto deve ser uma imagem.',
            'photos.*.mimes' => 'Cada foto deve ser um arquivo do tipo: jpeg, png, jpg, gif.',
            'photos.*.max' => 'Cada foto não pode ter mais que 2048 kilobytes.',
        ];
    }
}
