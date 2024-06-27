<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSaleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'client_id' => 'required|exists:clients,id',
            'quantity' => 'required|integer|min:1',
            'total_amount' => 'required|numeric|min:0',
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
            'client_id.required' => 'O campo cliente é obrigatório.',
            'client_id.exists' => 'O cliente selecionado não existe.',
            'quantity.required' => 'O campo quantidade é obrigatório.',
            'quantity.integer' => 'A quantidade deve ser um número inteiro.',
            'quantity.min' => 'A quantidade mínima é :min.',
            'total_amount.required' => 'O campo total da venda é obrigatório.',
            'total_amount.numeric' => 'O total da venda deve ser um valor numérico.',
            'total_amount.min' => 'O total da venda não pode ser menor que :min.',
        ];
    }
}
