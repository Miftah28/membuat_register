<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\register\registerpembeli;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('registerpenjual',[registerpembeli::class, 'index']);
Route::post('registerpenjuals',[registerpembeli::class, 'create']);
// Route::resource('register/registerpembeli', registerpembeli::class)->names('register.registerpembeli');
