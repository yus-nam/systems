<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;


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


// //Article&List->User、Regist->Usreg、app->usr、submit->usrsub //ユーザ画面
Route::get('/user', [UserController::class, 'showUser'])->name('user');
Route::get('/usreg', [UserController::class, 'showUsregForm']);
Route::post('/usreg', [UserController::class, 'usregUsrsub'])->name('usrsub');

// //Article->Product //商品一覧画面
Route::get('/list', [ProductController::class, 'showList'])->name('list');
Route::get('/regist', [ProductController::class, 'showRegistForm']);
Route::post('/regist', [ProductController::class, 'registSubmit'])->name('submit');

//検索機能show
Route::post('/search', [ProductController::class, 'searchList'])->name('search');


//商品登録画面 //データを受け取る処理
Route::get('/create', [ProductController::class, 'CreateProduct'])->name('create');
Route::post('/store', [ProductController::class, 'StoreProduct'])->name('store');


//商品詳細画面への移動
Route::get('/detail', [ProductController::class, 'showDetailForm'])->name('detail');

//商品編集画面への移動
Route::get('/edit', [ProductController::class, 'showEditForm'])->name('edit');

//商品更新処理
Route::get('/update', [ProductController::class, 'showUpdateForm'])->name('update');

//商品の削除
// Route::post('/destroy{id}', [ProductController::class, 'deleteProductById']);
Route::post('/product/delete/{id}', [ProductController::class, 'deleteProductById'])->name('delete');

// //Article&List->Sale、Regist->Sales、app->sell、submit->selling
Route::get('/sale', [SaleController::class, 'showSale'])->name('sale');
Route::get('/salreg', [SaleController::class, 'showSalregForm']);
Route::post('/salreg', [SaleController::class, 'SalregSelling'])->name('selling');


// //Article&List->Company、Regist->Compreg、app->cmp、submit->pany
Route::get('/company', [CompanyController::class, 'showCompany'])->name('company');
Route::get('/compreg', [CompanyController::class, 'showCompregForm']);
Route::post('/compreg', [CompanyController::class, 'compregPany'])->name('pany');

Route::get('/login', [LoginController::class, '/login'])->name('login');

// Route::get('/register', [RegisterController::class, '/register'])->name('register');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
