<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Mahasiswa;
use App\Http\Controllers\MahasiswaController;

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
    return $request->user();
});
Route::get('/index', [MahasiswaController::class,'index']);   
Route::post('/create', [MahasiswaController::class, 'create']);
Route::get('/read', [MahasiswaController::class, 'read']);
Route::get('mahasiswa', 'MahasiswaController@index');
Route::post('mahasiswa', 'MahasiswaController@store');
Route::get('mahasiswa/{nim}', 'MahasiswaController@show');
Route::put('mahasiswa/{nim}', 'MahasiswaController@update');
Route::delete('mahasiswa/{nim}', 'MahasiswaController@destroy');