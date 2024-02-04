<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\MessageController;

Route::prefix('admin')->middleware(['verified'])->group(function(){
  Route::get('addcar', [CarController::class, 'create'])->name('addcar');
  Route::post('storecar', [CarController::class, 'store'])->name('displaycar');
  Route::get('cars', [CarController::class, 'index'])->name('cars');
  Route::get('editcar/{id}', [CarController::class, 'edit']);
  Route::put('updatecar/{id}', [CarController::class, 'update'])->name('updatecar');
  Route::get('deletecar/{id}', [CarController::class, 'destroy']);
  Route::get('trashedcar', [CarController::class, 'trashed'])->name('trashedcar');
  Route::get('restorecar/{id}', [CarController::class, 'restore']);
  Route::get('fdcar/{id}', [CarController::class, 'fd']);
});

Route::prefix('admin')->middleware(['verified'])->group(function(){
  Route::get('addcategory', [CategoryController::class, 'create'])->name('addcategory');
  Route::post('storecategory', [CategoryController::class, 'store'])->name('displaycategory');
  Route::get('categories', [CategoryController::class, 'index'])->name('categories');
  Route::get('editcategory/{id}', [CategoryController::class, 'edit']);
  Route::put('updatecategory/{id}', [CategoryController::class, 'update'])->name('updatecategory');
  Route::get('deletecategory/{id}', [CategoryController::class, 'destroy']);
});

Route::prefix('admin')->middleware(['verified'])->group(function(){
  Route::get('adduser', [UserController::class, 'create'])->name('adduser');
  Route::post('storeuser', [UserController::class, 'store'])->name('displayuser');
  Route::get('users', [UserController::class, 'index'])->name('users');
  Route::get('edituser/{id}', [UserController::class, 'edit']);
  Route::put('updateuser/{id}', [UserController::class, 'update'])->name('updateuser');
});

Route::prefix('admin')->middleware(['verified'])->group(function(){
  Route::get('addtestimonial', [TestimonialController::class, 'create'])->name('addtestimonial');
  Route::post('storetestimonial', [TestimonialController::class, 'store'])->name('displaytestimonial');
  Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials');
  Route::get('edittestimonial/{id}', [TestimonialController::class, 'edit']);
  Route::put('updatetestimonial/{id}', [TestimonialController::class, 'update'])->name('updatetestimonial');
  Route::get('deletetestimonial/{id}', [TestimonialController::class, 'destroy']);
  Route::get('trashedtestimonial', [TestimonialController::class, 'trashed'])->name('trashedtestimonial');
  Route::get('restoretestimonial/{id}', [TestimonialController::class, 'restore']);
  Route::get('fdtestimonial/{id}', [TestimonialController::class, 'fd']);
});

Route::prefix('admin')->middleware(['verified'])->group(function(){
  Route::get('messages', [MessageController::class, 'index'])->name('messages');
  Route::get('showmessage/{id}', [MessageController::class, 'show'])->name('showmessage');
  Route::get('deletemessage/{id}', [MessageController::class, 'destroy']);
  Route::get('trashedmessage', [MessageController::class, 'trashed'])->name('trashedmessage');
  Route::get('restoremessage/{id}', [MessageController::class, 'restore']);
  Route::get('fdmessage/{id}', [MessageController::class, 'fd']);
});

