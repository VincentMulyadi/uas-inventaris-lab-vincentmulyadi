<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LandingPage\LandingPageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BorrowingController;
use App\Http\Controllers\Admin\EquipmentController;
use Illuminate\Support\Facades\Route;


// * Landing Page
Route::controller(LandingPageController::class)->group(function() {
  Route::get('/', 'index');
  Route::get('/form', 'form');
  Route::post('/form', 'submitForm');
  Route::get('/equipment', 'equipment');
});

//  * Auth
Route::controller(AuthController::class)->group(function() {
  Route::get('/signup', 'signup')->middleware('guest');
  Route::post('signup', 'registration')->middleware('guest');
  Route::get('/login', 'login')->middleware('guest')->name('login');
  Route::post('/login', 'authenticate')->middleware('guest');
  Route::post('/logout', 'logout')->middleware('auth');
});

// * Admin
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');
Route::resource('/admin/equipment', EquipmentController::class)->middleware('auth');
Route::resource('/admin/borrowings', BorrowingController::class)->middleware('auth');
