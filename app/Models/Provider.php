<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;
    /**
   * The table associated with the model.
   *
   * @var string
   */
  public $table = 'proveedores';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'razon_social', 'telefono', 'contacto_directo'
  ];


  public function Address()
  {
      return $this->belongsTo(Address::class, 'direccion_id');
  }
}
