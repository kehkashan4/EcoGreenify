<?php

namespace App\Http\Controllers\Ayesha;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    public function issues(){
        return view("Ayesha.issues");
    }
}
