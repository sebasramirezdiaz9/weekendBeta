<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'expedientes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'paciente_id', 'altura', 'peso', 'alergias'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'paciente_id');
    }

    //APPENDS//
    public function getPatientNameAttribute()
    {
        return $this->patient ? $this->patient->name. ' ' .$this->patient->ape_pat  : "No asignado";
    }
}
