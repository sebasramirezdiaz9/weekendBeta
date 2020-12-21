<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FavoritePlace extends Model
{
    use SoftDeletes;
      /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'favorites_places';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'place_id', 'user_id'
    ];


    public function place()
    {
        return $this->belongsTo(FavoritePlace::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
