<?php

namespace App\Http\Controllers\Kehkashan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about(){
        return view("Kehkashan.about");
    }
}
