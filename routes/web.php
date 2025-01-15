<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('Kehkashan.welcome');
})->name('page');

include('user.php');
include('admin.php');

Auth::routes();

Route::get('/admin', [HomeController::class, 'index'])->name('admin');
