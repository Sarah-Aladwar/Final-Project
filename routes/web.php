<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('index',[IndexController::class, 'index'])->name('index');
Route::get('listing',[IndexController::class, 'listing'])->name('listing');
Route::get('single/{id}',[IndexController::class, 'single'])->name('single');
Route::get('testimonies',[IndexController::class, 'testimonials'])->name('testimonies');
Route::get('blog',[IndexController::class, 'blog'])->name('blog');
Route::get('contact',[IndexController::class, 'contact'])->name('contact');
Route::get('about',[IndexController::class, 'about'])->name('about');
Route::fallback([IndexController::class, 'error404']);

Route::post('sendmail', [ContactController::class, 'contact'])->name('send');

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

