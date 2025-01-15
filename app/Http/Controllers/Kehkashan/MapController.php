<?php

namespace App\Http\Controllers\Kehkashan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function map(){
        return view("Kehkashan.map");
    }
}
