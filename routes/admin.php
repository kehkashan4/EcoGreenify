<?php
namespace App\Http\Middleware;

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FeatureCardController;
use App\Http\Controllers\Kehkashan\IssuesController;
use App\Http\Controllers\Kehkashan\Location\CityController;
use App\Http\Controllers\Kehkashan\Location\ProvinceController;
use App\Http\Controllers\Kehkashan\Location\TownController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MarkerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('isAdmin')->prefix('admin')->group(function(){
     Route::get('/',function(){
        return view('admin.main');
     })->name('admin');

     // Define a route for the admin profile
     Route::post('/admin-profile',[AdminProfileController::class,'update'])->name('adminprofile.update');


    //Registered User Route
     Route::prefix('user')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('admin.user.index');
        Route::get('/create',[UserController::class,'create'])->name('admin.user.create');
        Route::post('/store',[UserController::class,'store'])->name('admin.user.store');
        Route::get('/edit/{id}',[UserController::class,'edit'])->name('admin.user.edit');
        Route::post('/update/{id}',[UserController::class,'update'])->name('admin.user.update');
     });

     //FeatureCard Route
     Route::prefix('featurecard')->group(function(){
        Route::get('/',[FeatureCardController::class,'index'])->name('admin.featurecard.index');
        Route::get('/create',[FeatureCardController::class,'create'])->name('admin.featurecard.create');
        Route::post('/store',[FeatureCardController::class,'store'])->name('admin.featurecard.store');
        Route::get('/edit/{id}',[FeatureCardController::class,'edit'])->name('admin.featurecard.edit');
        Route::post('/update/{id}',[FeatureCardController::class,'update'])->name('admin.featurecard.update');
        Route::get('/delete/{id}',[FeatureCardController::class,'delete'])->name('admin.featurecard.delete');

     });

    //Province Route
     Route::prefix('province')->group(function(){
        Route::get('/',[ProvinceController::class,'index'])->name('admin.province.index');
        Route::get('/create',[ProvinceController::class,'create'])->name('admin.province.create');
        Route::post('/store',[ProvinceController::class,'store'])->name('admin.province.store');
        Route::get('/edit/{id}',[ProvinceController::class,'edit'])->name('admin.province.edit');
        Route::post('/update/{id}',[ProvinceController::class,'update'])->name('admin.province.update');
        Route::get('/delete/{id}',[ProvinceController::class,'delete'])->name('admin.province.delete');
     });

    //City Route
     Route::prefix('city')->group(function(){
        Route::get('/',[CityController::class,'index'])->name('admin.city.index');
        Route::get('/create',[CityController::class,'create'])->name('admin.city.create');
        Route::post('/store',[CityController::class,'store'])->name('admin.city.store');
        Route::get('/edit/{id}',[CityController::class,'edit'])->name('admin.city.edit');
        Route::post('/update/{id}',[CityController::class,'update'])->name('admin.city.update');
        Route::get('/delete/{id}',[CityController::class,'delete'])->name('admin.city.delete');
     });

    //Town Route
    Route::prefix('town')->group(function(){
        Route::get('/',[TownController::class,'index'])->name('admin.town.index');
        Route::get('/create',[TownController::class,'create'])->name('admin.town.create');
        Route::post('/store',[TownController::class,'store'])->name('admin.town.store');
        Route::get('/edit/{id}',[TownController::class,'edit'])->name('admin.town.edit');
        Route::post('/update/{id}',[TownController::class,'update'])->name('admin.town.update');
        Route::get('/delete/{id}',[TownController::class,'delete'])->name('admin.town.delete');
        Route::get('/get-cities/{province_id}', [TownController::class, 'getCities'])->name('admin.town.getCities');
    });

 //Location Route
    Route::prefix('locations')->group(function(){
        Route::get('/', [LocationController::class, 'index'])->name('locations');
        Route::get('/get-cities/{province_id}', [LocationController::class, 'getCities']);
        Route::get('/get-towns/{city_id}', [LocationController::class, 'getTowns']);
 });

    Route::prefix('marker')->group(function(){
        Route::get('/',[MarkerController::class,'index'])->name('admin.marker.index');
        Route::get('/create',[MarkerController::class,'create'])->name('admin.marker.create');
        Route::post('/store',[MarkerController::class,'store'])->name('admin.marker.store');
        Route::get('/edit/{slug}',[MarkerController::class,'edit'])->name('admin.marker.edit');
        Route::post('/update/{slug}',[MarkerController::class,'update'])->name('admin.marker.update');
        Route::get('/delete/{id}',[MarkerController ::class,'delete'])->name('admin.marker.delete');
    });

    //Issue Route
    Route::prefix('issue')->group(function(){
        Route::get('/',[IssuesController::class,'index'])->name('admin.issue.index');
        Route::get('/create',[IssuesController::class,'create'])->name('admin.issue.create');
        Route::post('/store',[IssuesController::class,'store'])->name('admin.issue.store');
        Route::get('/edit/{id}',[IssuesController::class,'edit'])->name('admin.issue.edit');
        Route::post('/update/{id}',[IssuesController::class,'update'])->name('admin.issue.update');
        Route::get('/delete/{id}',[IssuesController::class,'delete'])->name('admin.issue.delete');
    });

    //Category Route
    Route::prefix('category')->group(function(){
        Route::get('/',[CategoryController::class,'index'])->name('admin.category.index');
        Route::get('/create',[CategoryController::class,'create'])->name('admin.category.create');
        Route::post('/store',[CategoryController::class,'store'])->name('admin.category.store');
        Route::get('/edit/{slug}',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::post('/update/{slug}',[CategoryController::class,'update'])->name('admin.category.update');
        Route::get('/delete/{id}',[CategoryController ::class,'delete'])->name('admin.category.delete');
    });

     //Product Route
     Route::prefix('product')->group(function(){
        Route::get('/',[ProductController::class,'index'])->name('admin.product.index');
        Route::get('/create',[ProductController::class,'create'])->name('admin.product.create');
        Route::post('/store',[ProductController::class,'store'])->name('admin.product.store');
        Route::get('/edit/{slug}',[ProductController::class,'edit'])->name('admin.product.edit');
        Route::post('/update/{slug}',[ProductController::class,'update'])->name('admin.product.update');
        Route::get('/delete/{id}',[ProductController ::class,'delete'])->name('admin.product.delete');
    });

    //Slider Route
    Route::prefix('slider')->group(function(){
        Route::get('/',[SliderController::class,'index'])->name('admin.slider.index');
        Route::get('/create',[SliderController::class,'create'])->name('admin.slider.create');
        Route::post('/store',[SliderController::class,'store'])->name('admin.slider.store');
        Route::get('/edit/{id}',[SliderController::class,'edit'])->name('admin.slider.edit');
        Route::post('/update/{id}',[SliderController::class,'update'])->name('admin.slider.update');
        Route::get('/delete/{id}',[SliderController ::class,'delete'])->name('admin.slider.delete');
    });

    //Favorite Route
     Route::prefix('favorite')->group(function(){
        Route::get('/', [FavoriteController::class, 'show'])->name('admin.favorite.list');
        Route::delete('/favorite/{id}', [FavoriteController::class, 'delete'])->name('admin.favorite.delete');
    });
});


