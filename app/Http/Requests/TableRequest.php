<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableRequest extends FormRequest
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
            'table_number' => ['string', 'unique'],
            'type_id' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'table_number.string' => 'El formato para el campo número de mesa es inválido',
            'table_number.unique' => 'El número de mesa no debe estar repetido',
            'type_id.required' => 'El tipo es requerido'
        ];
    }
}
