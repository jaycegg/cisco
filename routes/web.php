<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SalleController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\MaterielController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\CampusController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UserController;

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

/* CRUD entiers */
Route::resource('salles', SalleController::class);
Route::resource('videos', VideoController::class);
Route::resource('materiels', MaterielController::class);
Route::resource('logs', LogController::class);
Route::resource('campuses', CampusController::class);
Route::resource('tickets', TicketController::class);
Route::resource('users', UserController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
