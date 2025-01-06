<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IssuesController extends Controller
{
    public function issues(){
        return view("issues");
    }
}
