<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SalleController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\MaterielController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\CampusController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NetacadController;

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

/*********************
 * La route pour accéder aux logs -> /log-reader (librairie complémentaire)
 *********************/

/* Route de la première page */
Route::get('/', function () {
    return view('welcome');
});

/* Route pouvant modifier les booleens concernant les etats */
/* Salles */
Route::group(['middleware' => 'auth'],function(){
    Route::get('/reservation/salles', [SalleController::class, 'showEtat'])->name('salleResa');
    Route::post('/reservation/salles', [SalleController::class, 'reserver'])->name('reservationSalles');
});

/* Materiels */
Route::get('/reservation/materiels', [MaterielController::class, 'showEtat'])->name('materielResa');
Route::post('/reservation/materiels', [MaterielController::class, 'reserver'])->name('reservationMateriels');

// Netacad - Promotion
Route::get('/netacad', [NetacadController::class, 'index'])->name('netacad');
Route::post('/upload', [NetacadController::class, 'upload'])->name('netacadUpload');

/* Gestion des tickets */
Route::get('/gestion/tickets', [TicketController::class, 'gestionTickets'])->name('gestionTickets');

/* Routes spécifiques concernant l'administrateur */
Route::group(['middleware' => ['admin']], function () {
    /* Acces vers le dashboard admin */
    Route::get('/dash', [UserController::class, 'dash'])->name('dash');

    /* CRUD entiers en une seule ligne*/
    Route::resource('salles', SalleController::class);
    Route::resource('videos', VideoController::class);
    Route::resource('materiels', MaterielController::class);
    Route::resource('logs', LogController::class);
    Route::resource('campuses', CampusController::class);
    Route::resource('tickets', TicketController::class);
    Route::resource('users', UserController::class);
    Route::resource('events', EventController::class);

});

/* Route concernant l'authentification, le mot de passe oublié, logout, ect... */
Auth::routes();

/* Route du menu principal */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
