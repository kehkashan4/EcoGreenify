<?php

namespace App\Http\Controllers\Kehkashan;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class MartController extends Controller
{
    public function mart()
    {
        $categories = Category::with('products')->get();
        $sliders = Slider::all();
        $admin=User::where('role','admin')->first();
        return view('Kehkashan.mart', compact('categories', 'sliders','admin'));
    }
}
