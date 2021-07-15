<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemControllerr;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/','index');
Route::resource('category', CategoryController::class );
Route::resource('item', ItemControllerr::class );
