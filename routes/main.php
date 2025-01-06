<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ChallengesController;
use App\Http\Controllers\IssuesController;
use App\Http\Controllers\FootprintController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MartController;

Route::prefix('website')->group(function(){
    Route::get('/',[HomePageController::class,'index'])->name('website.home');
    Route::get('/map',[MapController::class,'map'])->name('website.map');
    Route::get('/footprint',[FootprintController::class,'footprint'])->name('website.footprint');
    Route::get('/issues',[IssuesController::class,'issues'])->name('website.issues');
    Route::get('/mart',[MartController::class,'mart'])->name('website.mart');
    Route::get('/challenges',[ChallengesController::class,'challenges'])->name('website.challenges');
    Route::get('/about',[AboutController::class,'about'])->name('website.about');
});
