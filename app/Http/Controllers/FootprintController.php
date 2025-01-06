<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FootprintController extends Controller
{
    public function footprint(){
        return view("footprint");
    }
}
