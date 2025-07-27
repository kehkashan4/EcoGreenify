<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_selection extends Model
{
    protected $fillable = ['id','value','weight','score','attempt_id','question_id','option_id'];

    public function attempt(){
        return $this->belongsTo(User_attempt::class,'attempt_id');
    }

     public function question(){
        return $this->belongsTo(Question::class);
    }

     public function option(){
        return $this->belongsTo(Que_Option::class);
    }
}
