<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

//Import CSV
Route::post('/upload', [NetacadController::class, 'upload'])->name('netacadUpload');
Route::post('/upload/salles', [NetacadController::class, 'uploadSalle'])->name('netacadUploadSalle');
Route::post('/upload/materiels', [NetacadController::class, 'uploadMateriel'])->name('netacadUploadMateriel');
//Export CSV
Route::get('/netacad/csv/salle', [NetacadController::class, 'exportCsvSalle']);
Route::get('/netacad/csv/materiel', [NetacadController::class, 'exportCsvMateriel']);
Route::get('/netacad/csv/promo', [NetacadController::class, 'exportCsv']);

/* Gestion des tickets */
Route::get('/gestion/tickets', [TicketController::class, 'gestionTickets'])->name('gestionTickets');
Route::post('/gestion/tickets/materiel/valider', [TicketController::class, 'accepter'])->name('acMat');
Route::post('/gestion/tickets/decliner', [TicketController::class, 'decliner'])->name('dec');
Route::post('/gestion/tickets/salle/valider', [TicketController::class, 'accepterSalle'])->name('acSal');

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

    // CSV avec toutes les données
    Route::get('/liste/users/csv', [UserController::class, 'exportCsv']);
    Route::get('/liste/materiels/csv', [MaterielController::class, 'exportCsv']);
    Route::get('/liste/salles/csv', [SalleController::class, 'exportCsv']);
});

/* Route concernant l'authentification, le mot de passe oublié, logout, ect... */
Auth::routes();

/* Route du menu principal */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
