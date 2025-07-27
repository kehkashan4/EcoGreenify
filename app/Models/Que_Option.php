<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Que_Option extends Model
{
    protected $fillable = ['id','option','value','weight','question_id'];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function tip(){
        return $this->hasOne(Option_tip::class);
    }
}
