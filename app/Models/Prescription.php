<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Prescription extends Model
{
    use SoftDeletes;
    /**
   * The table associated with the model.
   *
   * @var string
   */
  public $table = 'recetas_medicas';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'ape_mat', 'ape_pat', 'telefono', 'genero', 'fecha_nacimiento'
  ];


  public function File()
  {
      return $this->hasOne(File::class);
  }
}
