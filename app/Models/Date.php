<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Date extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'citas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'paciente_id', 'doctor_id', 'fecha', 'hora'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'paciente_id');
    }

    //APPENDS//

    public function getDoctorNameAttribute()
    {
        return $this->doctor ? $this->doctor->name. ' ' .$this->doctor->ape_pat : "No asignado";
    }

    public function getPatientNameAttribute()
    {
        return $this->patient ? $this->patient->name. ' ' .$this->patient->ape_pat  : "No asignado";
    }
}
