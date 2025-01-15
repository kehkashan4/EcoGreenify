<?php

namespace App\Http\Controllers\Kehkashan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FootprintController extends Controller
{
    public function footprint(){
        return view("Kehkashan.footprint");
    }
}
