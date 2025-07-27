<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Kehkashan\IssuesController;
use App\Http\Controllers\Kehkashan\ChallengesController;
use App\Http\Controllers\Kehkashan\AboutController;
use App\Http\Controllers\Kehkashan\FootprintController;
use App\Http\Controllers\Kehkashan\MapController;
use App\Http\Controllers\Kehkashan\MartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;



    Route::get('/map',[MapController::class,'map'])->name('user.map');

    Route::get('/footprint',[FootprintController::class,'footprint'])->name('user.footprint');
    Route::get('/issues',[IssuesController::class,'issue'])->name('user.issues');

    Route::get('/mart',[MartController::class,'mart'])->name('user.mart');
    Route::get('/category/{slug}',[CategoryController::class,'show'])->name('category.show');
    Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/search-suggestions', [SearchController::class, 'suggestions']);

    // Cart Routes
    Route::get('/cart', [OrderController::class, 'showCart'])->name('cart.view');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

   // Checkout & Order (with authentication)
    Route::middleware('auth')->group(function () {
    Route::get('/checkout', [OrderController::class, 'checkoutForm'])->name('checkout.form');
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order.place');
});

    Route::get('/challenges',[ChallengesController::class,'challenges'])->name('user.challenges');
    Route::get('/about',[AboutController::class,'about'])->name('user.about');




