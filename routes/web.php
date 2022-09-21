<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('items');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});

// ユーザー一覧画面表示 
Route::get('/list', [App\Http\Controllers\UserController::class, 'list']);

// アイテム削除機能
Route::post('/destroy{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.destroy');

// ユーザー削除機能
Route::post('/delete{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.destroy');

// アイテム編集機能
Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('edit');
Route::post('/storeEdit', [App\Http\Controllers\ItemController::class, 'storeEdit'])->name('storeEdit');

// ユーザー編集機能
Route::get('/useredit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/userEdit', [App\Http\Controllers\UserController::class, 'userEdit'])->name('userEdit');