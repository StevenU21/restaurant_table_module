<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
            'name' => 'required|string|unique:types,name,' . $this->type,
            'unit_price' => ['required'],
            'capacity' => ['required', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'Formato de nombre no válido',
            'name.unique' => 'El nombre ya existe',
            'unit_price.required' => 'El precio es requerido',
            'capacity.required' => 'El precio es requerido',
            'capacity.integer' => 'El formalo debe ser numérico'
        ];
    }
}
