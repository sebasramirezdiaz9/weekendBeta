<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'user.name'                 => 'required|string|max:255',
            'user.email'                => 'required|email|unique:users,email',
            'doctor.name'               => 'required|string|max:255',
            'doctor.ape_mat'            => 'required|string|max:255',
            'doctor.ape_pat'            => 'required|string|max:255',
            'doctor.telefono'           => 'required|numeric|digits:10',
            'doctor.ape_pat'            => 'required|string|max:255',
            'doctor.universidad'        => 'required|string|max:255',
            'doctor.cedula_profesional' => 'required|string|max:255',

        ];
    }
}
