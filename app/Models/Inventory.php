<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'inventarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'medicamenti_id', 'cantidad'
    ];

    
  



    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicamento_id');
    }

    //APPENDS//

   

    public function getMedicineNameAttribute()
    {
        return $this->medicine ? $this->medicine->nombre  : "No asignado";
    }
}
