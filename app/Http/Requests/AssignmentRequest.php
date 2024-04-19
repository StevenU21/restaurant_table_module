<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentRequest extends FormRequest
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
            'table_id' => 'required',
            'client_id' => 'required',
            'assignment_type' => 'required',
            'reservation_date' => 'date|nullable',
            'reservation_time' => 'date_format:H:i|nullable'
        ];
    }

    public function messages()
    {
        return [
            'table_id.required' => 'La Mesa es requerida',
            'assignment_type.required' => 'Le asignación es requerida',
            'reservation_date.date' => 'La fecha de reserva debe ser una fecha',
            'reservation_time.date_format' => 'La hora de reserva debe ser una hora',
            'client_id.required' => 'El cliente es requerido'
        ];
    }
}
