<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

\Illuminate\Support\Facades\Auth::routes();



Route::middleware(['auth'])->group(function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::controller(TagController::class)->prefix('tags')->group(function () {
        Route::get('/','index');
        Route::get('/create','create');
        Route::get('/edit/{id}','edit');
        Route::post('/save','store');
        Route::put('/update','update');
        Route::delete('/delete/{id}','delete');
    });

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('/','index');
        Route::get('/create','create');
        Route::get('/edit/{id}','edit');
        Route::post('/save','store');
        Route::put('/update','update');
        Route::delete('/delete/{id}','delete');
    });
});
