<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->appli();
});


// //Article&List->Appli、Regist->Appreg、app->apl、submit->aplsub
// Route::get('/appli', [AppliController::class, 'showAppli'])->name('appli');
// Route::get('/appreg', [AppliController::class, 'showAppregForm']);
// Route::post('/appreg', [AppliController::class, 'AppregAplsub'])->name('aplsub');

Route::get('api','api\ApiController@index');


