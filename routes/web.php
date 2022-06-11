<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('tag/create',[\App\Http\Controllers\Backend\TagController::class,'create'])->name('tag.create');
Route::post('tag/store',[\App\Http\Controllers\Backend\TagController::class,'store'])->name('tag.store');
Route::get('tag',[\App\Http\Controllers\Backend\TagController::class,'index'])->name('tag.index');
Route::get('tag/{id}/edit',[\App\Http\Controllers\Backend\TagController::class,'edit'])->name('tag.edit');
Route::post('tag/{id}',[\App\Http\Controllers\Backend\TagController::class,'update'])->name('tag.update');
