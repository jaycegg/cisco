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

//listing des articles
Route::get('/materiel', [App\Http\Controllers\MaterielController::class, 'index'])->name('materiel.index');

Route::get('/campus', [App\Http\Controllers\MaterielController::class, 'index'])->name('campus.index');

Route::get('/salle', [App\Http\Controllers\MaterielController::class, 'index'])->name('salle.index');

Route::get('/ticket', [App\Http\Controllers\MaterielController::class, 'index'])->name('ticket.index');

Route::get('/video', [App\Http\Controllers\MaterielController::class, 'index'])->name('video.index');

Route::get('/user', [App\Http\Controllers\MaterielController::class, 'index'])->name('user.index');

//affichage de la page de création
Route::get('/materiel', [App\Http\Controllers\ArticleController::class, 'create'])->name('materiel.create');

Route::get('/campus', [App\Http\Controllers\ArticleController::class, 'create'])->name('campus.create');

Route::get('/salle', [App\Http\Controllers\ArticleController::class, 'create'])->name('salle.create');

Route::get('/ticket', [App\Http\Controllers\ArticleController::class, 'create'])->name('ticket.create');

Route::get('/video', [App\Http\Controllers\ArticleController::class, 'create'])->name('video.create');

Route::get('/user', [App\Http\Controllers\ArticleController::class, 'create'])->name('user.create');

//création
Route::post('/materiel', [App\Http\Controllers\ArticleController::class, 'store'])->name('materiel.store');

Route::post('/campus', [App\Http\Controllers\ArticleController::class, 'store'])->name('campus.store');

Route::post('/salle', [App\Http\Controllers\ArticleController::class, 'store'])->name('salle.store');

Route::post('/ticket', [App\Http\Controllers\ArticleController::class, 'store'])->name('ticket.store');

Route::post('/video', [App\Http\Controllers\ArticleController::class, 'store'])->name('video.store');

Route::post('/user', [App\Http\Controllers\ArticleController::class, 'store'])->name('user.store');

//affichage de la page d'un article
Route::get('/materiel', [App\Http\Controllers\ArticleController::class, 'show'])->name('materiel.show');

Route::get('/campus', [App\Http\Controllers\ArticleController::class, 'show'])->name('campus.show');

Route::get('/salle', [App\Http\Controllers\ArticleController::class, 'show'])->name('salle.show');

Route::get('/ticket', [App\Http\Controllers\ArticleController::class, 'show'])->name('ticket.show');

Route::get('/video', [App\Http\Controllers\ArticleController::class, 'show'])->name('video.show');

Route::get('/user', [App\Http\Controllers\ArticleController::class, 'show'])->name('user.show');


//affichage de la page d'édition
Route::get('/materiel', [App\Http\Controllers\ArticleController::class, 'edit'])->name('materiel.edit');

Route::get('/campus', [App\Http\Controllers\ArticleController::class, 'edit'])->name('campus.edit');

Route::get('/salle', [App\Http\Controllers\ArticleController::class, 'edit'])->name('salle.edit');

Route::get('/ticket', [App\Http\Controllers\ArticleController::class, 'edit'])->name('ticket.edit');

Route::get('/video', [App\Http\Controllers\ArticleController::class, 'edit'])->name('video.edit');

Route::get('/user', [App\Http\Controllers\ArticleController::class, 'edit'])->name('user.edit');

//modification
Route::put('/materiel', [App\Http\Controllers\ArticleController::class, 'update'])->name('materiel.update');

Route::put('/campus', [App\Http\Controllers\ArticleController::class, 'update'])->name('campus.update');

Route::put('/salle', [App\Http\Controllers\ArticleController::class, 'update'])->name('salle.update');

Route::put('/ticket', [App\Http\Controllers\ArticleController::class, 'update'])->name('ticket.update');

Route::put('/video', [App\Http\Controllers\ArticleController::class, 'update'])->name('video.update');

Route::put('/user', [App\Http\Controllers\ArticleController::class, 'update'])->name('user.update');

//suppression
Route::delete('/materiel', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('materiel.destroy');

Route::delete('/campus', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('campus.destroy');

Route::delete('/salle', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('salle.destroy');

Route::delete('/ticket', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('ticket.destroy');

Route::delete('/video', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('video.destroy');

Route::delete('/user', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('user.destroy');

///////

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
