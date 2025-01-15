<?php

namespace App\Http\Controllers\Kehkashan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MartController extends Controller
{
    public function mart(){
        return view("Kehkashan.mart");
    }
}
