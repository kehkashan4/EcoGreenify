<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_attempt extends Model
{
    protected $fillable= ['id','attempt_date','total_score','user_id'];

    public function selection(){
        return $this->hasMany(User_selection::class,'attempt_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
