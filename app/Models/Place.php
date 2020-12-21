<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Place extends Model
{
    use SoftDeletes;
      /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'places';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lat', 'lng'
    ];


    public function favorite_places()
    {
        return $this->hasMany(FavoritePlace::class);
    }
}
