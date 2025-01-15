<?php
use Illuminate\Support\Facades\Route;

Route::middleware('isAdmin')->prefix('admin')->group(function(){
     Route::get('/',function(){
        return view('admin.main');
     });
});
