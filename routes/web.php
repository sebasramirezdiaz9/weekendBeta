<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\ProviderController;

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

Route::get('/admin/dates', function () {
    return view('system.dates.index');
})->name('dates.view');

Route::get('/admin/provider', function () {
    return view('system.provider.index');
})->name('provider.view');



Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/doctors', DoctorController::class);
    Route::resource('/employees', EmployeeController::class);
    Route::resource('/patients', PatientsController::class);
    Route::resource('/medicine', MedicineController::class);
    Route::resource('/dates', DateController::class);
    Route::resource('/provider', ProviderController::class);
    Route::get('get/doctors/all/', [DoctorController::class, 'getAllDoctors'])->name('doctors.all');
    Route::get('get/patients/all/', [PatientsController::class, 'getAllPatients'])->name('patients.all');
});

