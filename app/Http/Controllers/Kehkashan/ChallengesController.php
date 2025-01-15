<?php

namespace App\Http\Controllers\Kehkashan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChallengesController extends Controller
{
    public function challenges(){
        return view("Kehkashan.challenges");
    }
}
