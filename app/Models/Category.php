<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id','name','image','description','slug'];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function setNameAttribute($value)
{
    $this->attributes['name'] = $value;

    $slug = Str::slug($value);
    $count = 1;

    // Check for existing slug in categories
    while (Category::where('slug', $slug)->exists()) {
        $slug = Str::slug($value) . '-' . $count;
        $count++;
    }

    $this->attributes['slug'] = $slug;
}
}
