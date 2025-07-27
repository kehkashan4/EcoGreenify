<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;


class Marker extends Model
{
    protected $fillable = ['id','latitude','longitude','image','description','place_name','address','circle_radius','slug'];

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function setPlaceNameAttribute($value){
        $this->attributes['place_name'] = $value;

        $slug= Str::slug($value);
        $count = 1;

        while (Marker::where('slug', $slug)->exists()) {
            $slug = Str::slug($value) . '-' . $count;
            $count++;
        }

        $this->attributes['slug'] = $slug;
    }

}
