<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['id','name','province_id'];

    public function province()
   {
         return $this->belongsTo(Province::class);
   }
   public function towns()
   {
       return $this->hasMany(Town::class);
   }
}
