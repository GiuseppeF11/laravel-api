<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\Api\ProjectController;
use Database\Seeders\ProjectSeeder;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::name('api.')->group(function () { //Su tutte queste rotte (per evitare conflitti) mettiamo a tutti il prefisso api.
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::resource('projects', ProjectController::class)->only([ /* Piuttosto che creare le rotte singolarmente uso resource e tramite la funzione only   */                                                   //
        'index',                                                 /*   dico di creare solo index e show */
        'show',
    ]);
});