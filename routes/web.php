<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\LaptopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('manage.manage');
});

//Admin
Route::get('/admins', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{admin}/edit', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');
// Laptop

Route::get('/laptops', [LaptopController::class, 'index'])->name('laptop.index');
Route::get('/laptop/create', [LaptopController::class, 'create'])->name('laptop.create');
Route::post('/laptop/store', [LaptopController::class, 'store'])->name('laptop.store');
Route::get('/laptop/{laptop}/edit', [LaptopController::class, 'edit'])->name('laptop.edit');
Route::put('/laptop/{laptop}', [LaptopController::class, 'update'])->name('laptop.update');
Route::delete('/laptop/{laptop}', [LaptopController::class, 'destroy'])->name('laptop.destroy');

//Component

Route::get('/components', [ComponentController::class, 'index'])->name('component.index');
Route::get('/component/create', [ComponentController::class, 'create'])->name('component.create');
Route::post('/component/store', [ComponentController::class, 'store'])->name('component.store');


//Brands

Route::get('/brands', [BrandController::class, 'index'])->name('brand.index');
Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
Route::get('/brand/{brand}/edit', [BrandController::class, 'edit'])->name('brand.edit');
Route::put('/brand/{brand}/edit', [BrandController::class, 'update'])->name('brand.update');
Route::delete('/brand/{brand}', [BrandController::class, 'destroy'])->name('brand.destroy');

//Color
Route::get('/colors', [ColorController::class, 'index'])->name('color.index');
Route::get('/color/create', [ColorController::class, 'create'])->name('color.create');
Route::post('/color/store', [ColorController::class, 'store'])->name('color.store');
Route::get('/color/{color}/edit', [ColorController::class, 'edit'])->name('color.edit');
Route::put('/color/{color}/edit', [ColorController::class, 'update'])->name('color.update');
Route::delete('/color/{color}', [ColorController::class, 'destroy'])->name('color.destroy');
