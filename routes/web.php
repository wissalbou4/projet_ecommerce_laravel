<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\UniteController;
use App\Http\Controllers\ModeReglementController;
use App\Http\Controllers\ReglementController;



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

Route::get('/admin', function () {
    return view('lyaouts.app');
});
Route::get('/', function () {
    return view('welcome');
});
Route::resource('clients', ClientController::class);
Route::resource('familles', FamilleController::class);
Route::resource('articles', ArticleController::class);
Route::resource('marques', MarqueController::class);
Route::resource('unites', UniteController::class);
Route::resource('modereglements', ModeReglementController::class);
Route::resource('reglements', ReglementController::class);
