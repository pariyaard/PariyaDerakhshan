<?php

use App\Http\Controllers\BerichtController;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Route;

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

//
//Route::resource(‘berichts’, BerichtController::class);
//Route::resource(‘berichts’, BerichtController::class);
//Route::get('bericht', [BerichtController::class, 'index']);
Route::get('/berichts/{id}', [BerichtController::class, 'show']);
