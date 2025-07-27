<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id','name', 'description', 'price', 'stock_quantity', 'image','is_available', 'category_id','slug'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function orderItems() {
        return $this->hasMany(Order_item::class);
    }

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        $slug = Str::slug($value);
        $count = 1;

        // Check for existing slug in categories
        while (Product::where('slug', $slug)->exists()) {
            $slug = Str::slug($value) . '-' . $count;
            $count++;
        }

        $this->attributes['slug'] = $slug;
    }

}
