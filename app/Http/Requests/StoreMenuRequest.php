<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'         => 'required|unique:menus,name',
            'route_get'    => 'required|unique:menus,route_get',
            'route_post'   => 'nullable|unique:menus,route_post',
            'route_put'    => 'nullable|unique:menus,route_put',
            'route_delete' => 'nullable|unique:menus,route_delete',
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique'         => 'Este nome já está em uso.',
            'name.required'       => 'O campo nome é obrigatório.',
            'route_get.unique'    => 'Este route_get já está em uso.',
            'route_get.required'  => 'O campo route_get é obrigatório.',
            'route_post.unique'   => 'Este route_post já está em uso.',
            'route_post.nullable' => 'O campo route_post é opcional.',
            'route_put.unique'    => 'Este route_put já está em uso.',
            'route_put.nullable'  => 'O campo route_put é opcional.',
            'route_delete.unique'    => 'Este route_delete já está em uso.',
            'route_delete.nullable'  => 'O campo route_delete é opcional.',
        ];
    }
}
