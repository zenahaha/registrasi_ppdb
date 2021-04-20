<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController as DC;
use App\Http\Controllers\AdminController as AC;

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

Route::group(['middleware' => 'is_admin'], function(){
    Route::get('/admin', [AC::class, 'index'])->name('admin.document');
});

Route::get('/admin/terima/{id}',[AC::class, 'diterima'])->name('admin.terima');
Route::get('/admin/tolak/{id}',[AC::class, 'ditolak'])->name('admin.tolak');

Route::get('/user/document', [DC::class, 'show'])->name('user.document');
Route::get('/user/create', [DC::class, 'create'])->name('user.create');
Route::post('/user/store', [DC::class, 'store'])->name('user.store');
Route::delete('/user/delete/{id}', [DC::class, 'destroy'])->name('user.delete');
Route::get('user/edit/{id}',[DC::class, 'edit'])->name('user.edit');
Route::patch('user/update/{id}', [DC::class, 'update'])->name('user.update');
Route::get('/document/edit/{id}',[DC::class,'edit']);
Route::patch('/document/update/{id}',[DC::class,'update'])->name('document.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin,/home', [App\Http\Controllers\HomeController::class, 'adminhome'])->name('admin.home')->middleware('is_admin');