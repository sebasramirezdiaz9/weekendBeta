<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'tipo_medicamento' => 'required|string|max:255',
            'presentacion' => 'required|string|max:255',
            'activo' => 'required|string|max:255',
            'precio_compra' => 'required|integer',
            'precio_venta' => 'required|integer',
            
            //
        ];
    }
}
