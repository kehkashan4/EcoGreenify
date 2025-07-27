<?php

use App\Http\Controllers\EcoFriendlyPlaceController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FeatureCardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MarkerController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [FeatureCardController::class,'show'])->name('page');
Route::middleware(['auth'])->group(function () {
    Route::post('/user-profile', [UserProfileController::class, 'update'])->name('userprofile.update');
});


Route::get('/show/{slug}', [MarkerController::class, 'show'])->name('marker.show');

Route::post('/toggle-favorite', [FavoriteController::class, 'toggle'])->middleware('auth');

Route::get('/get-provinces', [LocationController::class, 'getProvinces']);
Route::get('/get-cities/{province_id}', [LocationController::class, 'getCities']);
Route::get('/get-towns/{city_id}', [LocationController::class, 'getTowns']);
Route::get('/search-markers/{town_id}', [EcoFriendlyPlaceController::class, 'searchMarkers']);



include('user.php');
include('admin.php');

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
