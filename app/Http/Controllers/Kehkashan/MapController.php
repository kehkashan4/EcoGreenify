<?php

namespace App\Http\Controllers\Kehkashan;

use App\Http\Controllers\Controller;
use App\Models\Marker;



class MapController extends Controller
{
    public function map(){
        $markers=Marker::get();
        return view("Kehkashan.map",compact('markers'));
    }
}




