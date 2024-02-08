<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[HomeController::class, 'index']);
Route::get('/add-doctor-view',[AdminController::class, 'addView']);
Route::get('/home',[HomeController::class, 'redirect']);
Route::post('/upload-doctor',[AdminController::class, 'saveDoctor']);
Route::post('/appointment',[HomeController::class, 'appointment']);
Route::get('/my-appointment',[HomeController::class, 'myAppointment']);
//Route::delete('/cancel-appointment/{id}',[HomeController::class, 'cancelAppointment']);
Route::delete('/cancel-appointment/{appointment}', [HomeController::class, 'cancelAppointment'])->name('appointments.cancel');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
