<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'doctor_id'     => 'required|integer|exists:doctores,id',
            'paciente_id'   => 'required|integer|exists:pacientes,id',
            'fecha'         => 'required|date',
            'hora'          => 'required|date_format:H:i'
        ];
    }
}
