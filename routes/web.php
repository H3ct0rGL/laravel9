<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/productos', function () {
    return view('productos.index');
})->middleware(['auth', 'verified'])->name('productos');

Route::middleware('auth')->group(function () {
    Route::resource('/dashboard/productos', ProductosController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::resource('/dashboard/productos', ProductosController::class);
/*
Route::get('/movies','App\Http\Controllers\MovieController@index');
Route::get('/movies/create','App\Http\Controllers\MovieController@create');
Route::post('/movies/store','App\Http\Controllers\MovieController@store');
Route::get('/movies/show/{id}','App\Http\Controllers\MovieController@show');
Route::get('/movies/edit/{id}','App\Http\Controllers\MovieController@edit');
Route::post('/movies/update/{id}','App\Http\Controllers\MovieController@update');
Route::get('/movies/delete/{id}','App\Http\Controllers\MovieController@delete');
*/
require __DIR__.'/auth.php';
