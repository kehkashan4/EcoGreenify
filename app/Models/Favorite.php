<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable=['id','user_id','marker_id'];

    public function user()
    {
          return $this->belongsTo(User::class);
    }

    public function marker()
    {
          return $this->belongsTo(Marker::class);
    }
}
