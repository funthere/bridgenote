<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\MemberController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/members', 'MemberController@index');
Route::get('/members/{id}', 'MemberController@show');
Route::post('/members', 'MemberController@store');
Route::put('/members/{id}', 'MemberController@update');
Route::delete('/members/{id}', 'MemberController@destroy');
// Route::apiResource('/members', MemberController::class)->middleware('');
