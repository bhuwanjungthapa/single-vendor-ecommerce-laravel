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

//Tag
Route::get('tag/create',[\App\Http\Controllers\Backend\TagController::class,'create'])->name('tag.create');
Route::post('tag/store',[\App\Http\Controllers\Backend\TagController::class,'store'])->name('tag.store');
Route::get('tag',[\App\Http\Controllers\Backend\TagController::class,'index'])->name('tag.index');
Route::get('tag/{id}/edit',[\App\Http\Controllers\Backend\TagController::class,'edit'])->name('tag.edit');
Route::put('tag/{id}',[\App\Http\Controllers\Backend\TagController::class,'update'])->name('tag.update');
Route::delete('tag/{id}',[\App\Http\Controllers\Backend\TagController::class,'destroy'])->name('tag.destroy');

//Attribute
Route::get('attribute/create',[\App\Http\Controllers\Backend\AtttributeController::class,'create'])->name('attribute.create');
Route::post('attribute/store',[\App\Http\Controllers\Backend\AtttributeController::class,'store'])->name('attribute.store');
Route::get('attribute',[\App\Http\Controllers\Backend\AtttributeController::class,'index'])->name('attribute.index');
Route:: get('attribute/{id}/show',[\App\Http\Controllers\Backend\AtttributeController::class,'show'])->name('attribute.show');
Route::get('attribute/{id}/edit',[\App\Http\Controllers\Backend\AtttributeController::class,'edit'])->name('attribute.edit');
Route::put('attribute/{id}',[\App\Http\Controllers\Backend\AtttributeController::class,'update'])->name('attribute.update');
Route::delete('attribute/{id}',[\App\Http\Controllers\Backend\AtttributeController::class,'destroy'])->name('attribute.destroy');

//Brand
Route::get('brand/create',[\App\Http\Controllers\Backend\BrandController::class,'create'])->name('brand.create');
Route::post('brand/store',[\App\Http\Controllers\Backend\BrandController::class,'store'])->name('brand.store');
Route::get('brand',[\App\Http\Controllers\Backend\BrandController::class,'index'])->name('brand.index');
Route::post('brand/{id}/show',[\App\Http\Controllers\Backend\BrandController::class,'show'])->name('brand.show');
Route::get('brand/{id}/edit',[\App\Http\Controllers\Backend\BrandController::class,'edit'])->name('brand.edit');
Route::put('brand/{id}',[\App\Http\Controllers\Backend\BrandController::class,'update'])->name('brand.update');
Route::delete('brand/{id}',[\App\Http\Controllers\Backend\BrandController::class,'destroy'])->name('brand.destroy');

//Category
Route::get('category/create',[\App\Http\Controllers\Backend\CategoryController::class,'create'])->name('category.create');
Route::post('category/store',[\App\Http\Controllers\Backend\CategoryController::class,'store'])->name('category.store');
Route::get('category',[\App\Http\Controllers\Backend\CategoryController::class,'index'])->name('category.index');
Route::post('category/{id}/show',[\App\Http\Controllers\Backend\CategoryController::class,'show'])->name('category.show');
Route::get('category/{id}/edit',[\App\Http\Controllers\Backend\CategoryController::class,'edit'])->name('category.edit');
Route::put('category/{id}',[\App\Http\Controllers\Backend\CategoryController::class,'update'])->name('category.update');
Route::delete('category/{id}',[\App\Http\Controllers\Backend\CategoryController::class,'destroy'])->name('category.destroy');

//Products
Route::get('product/create',[\App\Http\Controllers\Backend\ProductController::class,'create'])->name('product.create');
Route::post('product/store',[\App\Http\Controllers\Backend\ProductController::class,'store'])->name('product.store');
Route::get('product',[\App\Http\Controllers\Backend\ProductController::class,'index'])->name('product.index');
Route::post('product/{id}/show',[\App\Http\Controllers\Backend\ProductController::class,'store'])->name('product.show');
Route::get('product/{id}/edit',[\App\Http\Controllers\Backend\ProductController::class,'edit'])->name('product.edit');
Route::put('product/{id}',[\App\Http\Controllers\Backend\ProductController::class,'update'])->name('product.update');
Route::delete('product/{id}',[\App\Http\Controllers\Backend\ProductController::class,'destroy'])->name('product.destroy');

//sub_category
Route::get('subcategories/create',[\App\Http\Controllers\Backend\SubcategoryController::class,'create'])->name('subcategories.create');
Route::post('subcategories/store',[\App\Http\Controllers\Backend\SubcategoryController::class,'store'])->name('subcategories.store');
Route::get('subcategories',[\App\Http\Controllers\Backend\SubcategoryController::class,'index'])->name('subcategories.index');
Route::post('subcategories/{id}/show',[\App\Http\Controllers\Backend\SubcategoryController::class,'store'])->name('subcategories.show');
Route::get('subcategories/{id}/edit',[\App\Http\Controllers\SubcategoryController::class,'edit'])->name('subcategories.edit');
Route::put('subcategories/{id}',[\App\Http\Controllers\Backend\SubcategoryController::class,'update'])->name('subcategories.update');
Route::delete('subcategories/{id}',[\App\Http\Controllers\Backend\SubcategoryController::class,'destroy'])->name('subcategories.destroy');
