<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    protected $fillable = ['id','name'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function towns()
    {
        return $this->hasMany(Town::class);
    }
}
