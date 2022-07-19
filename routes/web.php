<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\InprogressController;
use App\Http\Controllers\FinishedController;
use App\Http\Controllers\HomeProjetController;
use App\Http\Controllers\BackgroundImageController;

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

Route::get('/homes', [HomeController::class, 'index'])
    ->name('homes.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');


// Modif profil //

Route::get('/profils', [ProfilController::class, 'index'])
    ->name('profils.index');

Route::put('profils/{id}', [ProfilController::class, 'update'])
    ->name('profils.update');

Route::get('/homes', [ProfilController::class, 'index'])
    ->name('homes.index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/homes', [HomeController::class, 'index'])
    ->name('homes.index');

Route::get('/projet', [HomeProjetController::class, 'index'])
    ->name('projet');




// Route taches A FAIRE


Route::post('/in-todo', [TodoController::class, 'store'])
    ->name("inTodo.store");

// Route taches EN COURS


Route::post('/in-progress', [InprogressController::class, 'store'])
    ->name("inProgress.store");

// Route taches TERMINEES

Route::post('/finished', [FinishedController::class, 'store'])
    ->name('finished.store');



Route::resource('homesToDo', Todocontroller::class);

Route::resource('homesIP', InprogressController::class);

Route::resource('homesFinish', FinishedController::class);

Route::resource('homes', InprogressController::class);


// UPDATE MODAL //////////////////////
Route::put('/update-status/{id}', [HomeController::class, 'updateStatus'])
    ->name('update.status');

Route::put('/update-status-inProgress/{id}', [HomeController::class, 'updateStatus'])
    ->name('update.status-inProgress');

Route::put('/update-status-finished/{id}', [HomeController::class, 'updateStatus'])
    ->name('update.status-finished');

Route::put('/update-status/{id}', [HomeProjetController::class, 'updateStatus'])
    ->name('update.status');

Route::put('/update-status-inProgress/{id}', [HomeProjetController::class, 'updateStatus'])
    ->name('update.status-inProgress');

Route::put('/update-status-finished/{id}', [HomeProjetController::class, 'updateStatus'])
    ->name('update.status-finished');
/////////////////////////////

//Route pour changement fond d'écran

Route::post('backgroundImage', [BackgroundImageController::class, 'store'])
    ->name('backgroundImage.store');

Route::resource('backgroundImage.store', BackgroundImageController::class);
