<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\PlaceController;
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

Route::get('/admin/places', function () {
    return view('system.places.index');
})->name('places.view');

Route::get('/admin/favorite-places', function () {
    return view('system.favorite_places.index');
})->name('favorite-places.view');

Route::get('/admin/popular_favorites', function () {
    return view('system.popular_favorites.index');
})->name('popular_favorites.view');

Route::get('/admin/profile', function () {
    return view('system.profile.index');
})->name('profile.view');


Route::get('/admin/instructions', function () {
    return view('system.instrucctions.index');
})->name('instructions.view');



Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('login/{provider}', [App\Http\Controllers\Auth\SocialiteLoginController::class, 'redirectToProvider'])->name('social.auth');
Route::get('auth/{provider}/callback', [App\Http\Controllers\Auth\SocialiteLoginController::class, 'handleProviderCallback']);

Route::middleware(['auth'])->group(function () {
    Route::resource('/users', UserController::class);
    Route::get('get/places', [PlaceController::class, 'getPlaces'])->name('get.places');
    Route::post('places/favorite_places', [PlaceController::class, 'addFavorite'])->name('add.favorite_places');
    Route::get('get/favorite/places', [PlaceController::class, 'getFavoritePlaces'])->name('get.favorite.places');
    Route::get('get/popular', [PlaceController::class, 'getPopularPlaces'])->name('get.popular.places');
    Route::get('get/profile/data', [UserController::class, 'getData'])->name('get.data');
});

