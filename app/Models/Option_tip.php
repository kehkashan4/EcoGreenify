<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use League\Uri\Idna\Option;

class Option_tip extends Model
{
    protected $fillable = ['id','option_id','option_tip','type'];

    public function option(){
        return $this->belongsTo(Option::class);
    }
}
