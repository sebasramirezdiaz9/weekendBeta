<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
      /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'medicamento';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'tipo_medicamento', 'presentacion', 'activo', 'precio_compra', 'precio_venta'
    ];


    
}
