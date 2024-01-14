<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoController;
use App\Http\Controllers\PhpController;
use App\Http\Controllers\PythonController;
use App\Http\Controllers\JavascriptController;

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
})->name('home');
Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');

Route::get('/php/online-compiler/', [PhpController::class, 'create'])->name('php');
Route::post('/php/online-compiler/', [PhpController::class, 'execute'])->name('execute-php');

Route::get('/python/online-compiler/', [PythonController::class, 'create'])->name('python');
Route::post('/python/online-compiler/', [PythonController::class, 'execute'])->name('execute-python');

Route::get('/js/online-compiler/', [JavascriptController::class, 'create'])->name('js');
Route::post('/js/online-compiler/', [JavascriptController::class, 'execute'])->name('execute-js');

Route::get('/go/online-compiler/', [GoController::class, 'create'])->name('go');
Route::post('/go/online-compiler/', [GoController::class, 'execute'])->name('execute-go');

require __DIR__.'/auth.php';
