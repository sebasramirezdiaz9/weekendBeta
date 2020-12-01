<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeCreateRequest extends FormRequest
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
            'employee.nombre'             => 'required|string|max:255',
            'employee.ape_mat'          => 'required|string|max:255',
            'employee.ape_pat'          => 'required|string|max:255',
            'employee.telefono'         => 'required|numeric|digits:10',
            'employee.ape_pat'          => 'required|string|max:255',
        ];
    }
}
