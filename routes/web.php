<?php

use App\Http\Controllers\annonce;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Entity;
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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\indexController;
 
Route::get('/', [indexController::class, 'showIndex']);
Route::get('/inscription', [indexController::class, 'showInscription']);
Route::POST('/inscriptionController', [indexController::class, 'inscriptionController']);
Route::get('/home', [indexController::class, 'showHome'])->name('home');
Route::get('/connexion', [indexController::class, 'showConnexion']);
Route::POST('/connexionController', [indexController::class, 'connexionController']);
Route::get('/modification', [indexController::class, 'showModification']);
Route::POST('/Entity_update', [Entity::class, 'call_update']);
Route::get('/annonce' , [AnnonceController::class, 'annonce']);
Route::post('/addAnnonce' , [AnnonceController::class , 'addAnnonce']);
Route::get('/listAnnonce' , [AnnonceController::class , 'listAnnonce']);

