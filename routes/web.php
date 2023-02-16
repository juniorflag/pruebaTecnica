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


Route::get('usersRespuesta', [App\Http\Controllers\UserController::class,'respuestas'])->name('users.respuestas');

Route::get('/verificacion', function () {
    return view('auth.verify');
})->name('verificacion');

Route::get('/sesiones', function () {
    return view('sesiones');
})->name('sesion');




Route::middleware(['guardarCookie','verificarDias','verifiedEmail'])->group(function () {
   Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('roles', App\Http\Controllers\RolesController::class);


Route::resource('permissions', App\Http\Controllers\PermissionsController::class);


Route::resource('users', App\Http\Controllers\UserController::class);
});
