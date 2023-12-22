<?php
use App\Http\Controllers\ShortlinkController;
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

//Route::post('/shortlink',[ShortlinkController::class, 'shortURL']);
Route::get('/{code}',[ShortlinkController::class, 'redirectLongURL']);