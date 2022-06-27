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
Route::prefix('backend/tag/')->name('backend.tag.')->group(function (){
    Route:: get('trash', [\App\Http\Controllers\Backend\TagController::class, 'trash'])->name('trash');
    Route:: post('restore/{id}', [\App\Http\Controllers\Backend\TagController::class, 'restore'])->name('restore');
    Route:: delete('force_delete/{id}', [\App\Http\Controllers\Backend\TagController::class, 'permanentDelete'])->name('force_delete');
    Route::get('create', [\App\Http\Controllers\Backend\TagController::class, 'create'])->name('create');
    Route::post('store', [\App\Http\Controllers\Backend\TagController::class, 'store'])->name('store');
    Route::get('', [\App\Http\Controllers\Backend\TagController::class, 'index'])->name('index');
    Route::get('{id}/edit', [\App\Http\Controllers\Backend\TagController::class, 'edit'])->name('edit');
    Route::put('{id}', [\App\Http\Controllers\Backend\TagController::class, 'update'])->name('update');
    Route::delete('{id}', [\App\Http\Controllers\Backend\TagController::class, 'destroy'])->name('destroy');
});


//Attribute
Route::prefix('backend/attribute/')->name('backend.attribute.')->group(function(){
    Route:: get('trash',[\App\Http\Controllers\Backend\AtttributeController::class,'trash'])->name('trash');
    Route:: post('restore/{id} ',[\App\Http\Controllers\Backend\AtttributeController::class,'restore'])->name('restore');
    Route:: delete ('force_delete/{id}',[\App\Http\Controllers\Backend\AtttributeController::class,'permanentDelete'])->name('force_delete');
    Route::get('create',[\App\Http\Controllers\Backend\AtttributeController::class,'create'])->name('create');
    Route:: post('store',[\App\Http\Controllers\Backend\AtttributeController::class,'store'])->name('store');
    Route::get('',[\App\Http\Controllers\Backend\AtttributeController::class,'index'])->name('index');
    Route:: get('{id}',[\App\Http\Controllers\backend\AtttributeController::class,'show'])->name('show');
    Route:: delete('{id}',[\App\Http\Controllers\backend\AtttributeController::class,'destroy'])->name('destroy');
    Route:: get('{id}/edit',[\App\Http\Controllers\backend\AtttributeController::class,'edit'])->name('edit');
    Route:: put('{id}',[\App\Http\Controllers\backend\AtttributeController::class,'update'])->name('update');
});

//Brand
Route::get('brand/create',[\App\Http\Controllers\Backend\BrandController::class,'create'])->name('brand.create');
Route::post('brand/store',[\App\Http\Controllers\Backend\BrandController::class,'store'])->name('brand.store');
Route::get('brand',[\App\Http\Controllers\Backend\BrandController::class,'index'])->name('brand.index');
Route::post('brand/{id}/show',[\App\Http\Controllers\Backend\BrandController::class,'show'])->name('brand.show');
Route::get('brand/{id}/edit',[\App\Http\Controllers\Backend\BrandController::class,'edit'])->name('brand.edit');
Route::put('brand/{id}',[\App\Http\Controllers\Backend\BrandController::class,'update'])->name('brand.update');
Route::delete('brand/{id}',[\App\Http\Controllers\Backend\BrandController::class,'destroy'])->name('brand.destroy');

//Category
Route::prefix('backend/category/')->name('backend.category.')->group(function (){
    Route:: get('trash', [\App\Http\Controllers\Backend\CategoryController::class, 'trash'])->name('trash');
    Route:: post('restore/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'restore'])->name('restore');
    Route:: delete('force_delete/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'permanentDelete'])->name('force_delete');
    Route::get('create', [\App\Http\Controllers\Backend\CategoryController::class, 'create'])->name('create');
    Route::post('store', [\App\Http\Controllers\Backend\CategoryController::class, 'store'])->name('store');
    Route::get('', [\App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('index');
    Route:: get('{id}',[\App\Http\Controllers\backend\CategoryController::class,'show'])->name('show');
    Route::get('{id}/edit', [\App\Http\Controllers\Backend\CategoryController::class, 'edit'])->name('edit');
    Route::put('{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'update'])->name('update');
    Route::delete('{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'destroy'])->name('destroy');
});

//Products
Route::prefix('backend/product/')->name('backend.product.')->group(function (){
    Route:: get('trash', [\App\Http\Controllers\Backend\ProductController::class, 'trash'])->name('trash');
    Route:: post('restore/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'restore'])->name('restore');
    Route:: delete('force_delete/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'permanentDelete'])->name('force_delete');
    Route::get('create', [\App\Http\Controllers\Backend\ProductController::class, 'create'])->name('create');
    Route::post('store', [\App\Http\Controllers\Backend\ProductController::class, 'store'])->name('store');
    Route::get('', [\App\Http\Controllers\Backend\ProductController::class, 'index'])->name('index');
    Route:: get('{id}',[\App\Http\Controllers\backend\ProductController::class,'show'])->name('show');
    Route::get('{id}/edit', [\App\Http\Controllers\Backend\ProductController::class, 'edit'])->name('edit');
    Route::put('{id}', [\App\Http\Controllers\Backend\ProductController::class, 'update'])->name('update');
    Route::delete('{id}', [\App\Http\Controllers\Backend\ProductController::class, 'destroy'])->name('destroy');
});
//sub_category
Route::prefix('backend/subcategories/')->name('backend.subcategories.')->group(function (){
    Route:: get('trash', [\App\Http\Controllers\Backend\SubcategoryController::class, 'trash'])->name('trash');
    Route:: post('restore/{id}', [\App\Http\Controllers\Backend\SubcategoryController::class, 'restore'])->name('restore');
    Route:: delete('force_delete/{id}', [\App\Http\Controllers\Backend\SubcategoryController::class, 'permanentDelete'])->name('force_delete');
    Route::get('create', [\App\Http\Controllers\Backend\SubcategoryController::class, 'create'])->name('create');
    Route::post('store', [\App\Http\Controllers\Backend\SubcategoryController::class, 'store'])->name('store');
    Route::get('', [\App\Http\Controllers\Backend\SubcategoryController::class, 'index'])->name('index');
    Route:: get('{id}',[\App\Http\Controllers\backend\SubcategoryController::class,'show'])->name('show');
    Route::get('{id}/edit', [\App\Http\Controllers\Backend\SubcategoryController::class, 'edit'])->name('edit');
    Route::put('{id}', [\App\Http\Controllers\Backend\SubcategoryController::class, 'update'])->name('update');
    Route::delete('{id}', [\App\Http\Controllers\Backend\SubcategoryController::class, 'destroy'])->name('destroy');
});
