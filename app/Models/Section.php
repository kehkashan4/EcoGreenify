<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['id','title'];

    public function question(){
        return $this->hasMany(Question::class);
    }
}
