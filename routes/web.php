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
    Route::any('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::controller(TagController::class)->prefix('tags')->group(function () {
        Route::get('/','index')->name("tags.index");
        Route::get('/create','create')->name("tags.create");
        Route::get('/edit/{id}','edit')->name("tags.edit");
        Route::post('/save','store')->name("tags.save");
        Route::put('/update/{id}','update')->name("tags.update");
        Route::delete('/delete/{id}','destroy')->name("tags.delete");
    });

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('/','index')->name("products.index");
        Route::get('/create','create')->name("products.create");
        Route::get('/edit/{id}','edit')->name("products.edit");
        Route::post('/save','store')->name("products.save");
        Route::put('/update{id}','update')->name("products.update");
        Route::delete('/delete/{id}','delete')->name("products.delete");
    });
});
