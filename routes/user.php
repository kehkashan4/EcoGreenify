<?php

use App\Http\Controllers\Ayesha\IssuesController;
use App\Http\Controllers\Kehkashan\ChallengesController;
use App\Http\Controllers\Kehkashan\AboutController;
use App\Http\Controllers\Kehkashan\FootprintController;
use App\Http\Controllers\Kehkashan\MapController;
use App\Http\Controllers\Kehkashan\MartController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function(){
    Route::get('/map',[MapController::class,'map'])->name('user.map');
    Route::get('/footprint',[FootprintController::class,'footprint'])->name('user.footprint');
    Route::get('/issues',[IssuesController::class,'issues'])->name('user.issues');
    Route::get('/mart',[MartController::class,'mart'])->name('user.mart');
    Route::get('/challenges',[ChallengesController::class,'challenges'])->name('user.challenges');
    Route::get('/about',[AboutController::class,'about'])->name('user.about');
});




