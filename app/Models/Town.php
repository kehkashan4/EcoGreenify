<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $fillable = ['id','name','province_id','city_id','latitude','longitude'];

    public function province()
    {
          return $this->belongsTo(Province::class);
    }

    public function city()
    {
          return $this->belongsTo(city::class);
    }
}
