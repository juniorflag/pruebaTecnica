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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verifiedEmail');


Route::resource('roles', App\Http\Controllers\RolesController::class)->middleware('verifiedEmail');


Route::resource('permissions', App\Http\Controllers\PermissionsController::class)->middleware('verifiedEmail');


Route::resource('users', App\Http\Controllers\UserController::class)->middleware('verifiedEmail');
Route::get('usersRespuesta', [App\Http\Controllers\UserController::class,'respuestas'])->name('users.respuestas');

Route::get('/verificacion', function () {
    return view('auth.verify');
})->name('verificacion');
