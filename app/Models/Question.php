<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Pail\Options;

class Question extends Model
{
    protected $fillable = ['id','question','allow_multiple','section_id'];

    public function section()  {
        return $this->belongsTo(Section::class);

    }
    public function option(){
        return $this->hasMany(Que_Option::class);
    }
}
