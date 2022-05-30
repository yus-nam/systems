<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CompanyController;


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


// //Article&List->User、Regist->Usreg、app->usr、submit->usrsub
Route::get('/user', [UserController::class, 'showUser'])->name('user');
Route::get('/usreg', [UserController::class, 'showUsregForm']);
Route::post('/usreg', [UserController::class, 'usregUsrsub'])->name('usrsub');


// //Article->Product
Route::get('/list', [ProductController::class, 'showList'])->name('list');
Route::get('/regist', [ProductController::class, 'showRegistForm']);
Route::post('/regist', [ProductController::class, 'registSubmit'])->name('submit');


// //Article&List->Sale、Regist->Sales、app->sell、submit->selling
Route::get('/sale', [SaleController::class, 'showSale'])->name('sale');
Route::get('/salreg', [SaleController::class, 'showSalregForm']);
Route::post('/salreg', [SaleController::class, 'SalregSelling'])->name('selling');


// //Article&List->Company、Regist->Compreg、app->cmp、submit->pany
Route::get('/company', [CompanyController::class, 'showCompany'])->name('company');
Route::get('/compreg', [CompanyController::class, 'showCompregForm']);
Route::post('/compreg', [CompanyController::class, 'compregPany'])->name('pany');





