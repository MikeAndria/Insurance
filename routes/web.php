<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myApp\MainController;
use App\Http\Controllers\myApp\ClientController;
use App\Http\Controllers\myApp\ContratController;
use App\Http\Controllers\myApp\SinistreController;
use App\Http\Controllers\myApp\RelationController;
use App\Http\Controllers\myApp\HistoriqueController;
use App\Http\Controllers\auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [MainController::class, 'acceuil'])->name('acceuil');

Route::get('/clients', [ClientController::class, 'clients'])->name('clients');
Route::get('/clients_sans_contrat', [ClientController::class, 'clientsSansContrat'])->name('clients_sans_contrat');
Route::get('/clients_avec_contrat', [ClientController::class, 'clientsAvecContrat'])->name('clients_avec_contrat');
Route::get('/clients_individuel', [ClientController::class, 'clientsIndividuel'])->name('clients_individuel');
Route::get('/clients_groupe', [ClientController::class, 'clientsGroupe'])->name('clients_groupe');
Route::get('/clients/recherche', [ClientController::class, 'rechercherClientParId'])->name('recherche_client');
Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/delete/{id}', [ClientController::class, 'destroy'])->name('clients.delete');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');



Route::get('/contrats', [ContratController::class, 'contrats'])->name('contrats');
Route::get('/contrats_vie', [ContratController::class, 'contratsVie'])->name('contrats_vie');
Route::get('/contrats_non_vie', [ContratController::class, 'contratsNonVie'])->name('contrats_non_vie');
Route::get('/contrats/recherche', [ContratController::class, 'rechercherContratParId'])->name('recherche_contrat');
Route::post('/contrats/store', [ContratController::class, 'store'])->name('contrats.store');
Route::get('/contrats/delete/{id}', [ContratController::class, 'destroy'])->name('contrats.delete');
Route::put('/contrats/{id}', [ContratController::class, 'update'])->name('contrats.update');


Route::get('/sinistres', [SinistreController::class, 'sinistres'])->name('sinistres');
Route::get('/sinistres/recherche', [SinistreController::class, 'rechercherSinistreParId'])->name('recherche_sinistre');
Route::post('/sinistres/store', [SinistreController::class, 'store'])->name('sinistres.store');
Route::get('/sinistres/delete/{id}', [SinistreController::class, 'destroy'])->name('sinistres.delete');
Route::put('/sinistres/{id}', [SinistreController::class, 'update'])->name('sinistres.update');

Route::get('/relations', [RelationController::class, 'relations'])->name('relations');
Route::get('/historiques', [HistoriqueController::class, 'historiques'])->name('historiques');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/password/forgot', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/password/forgot', [AuthController::class, 'sendResetLink']);
Route::get('/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'resetPassword']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');