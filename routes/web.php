<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});


Route::get('/admin/employees', function () {
    return view('system.users.index');
})->name('users.view');

Route::get('/admin/doctors', function () {
    return view('system.doctors.index');
})->name('doctors.view');

Route::get('/admin/patients', function () {
    return view('system.patients.index');
})->name('patients.view');

Route::get('/admin/medicine', function () {
    return view('system.medicine.index');
})->name('medicine.view');

Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/doctors', DoctorController::class);
    Route::resource('/patients', PatientsController::class);
    Route::resource('/medicine', MedicineController::class);
});

