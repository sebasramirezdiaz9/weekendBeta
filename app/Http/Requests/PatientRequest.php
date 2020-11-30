<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'ape_mat' => 'required|string|max:255',
            'ape_pat' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
        ];
    }
}
