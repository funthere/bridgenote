<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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


Route::get('/dashboard', [MemberController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/list', [MemberController::class, 'dashboard'])->middleware('auth')->name('members.index');
Route::get('/create', [MemberController::class, 'create'])->middleware('auth')->name('members.create');
Route::post('/store', [MemberController::class, 'store'])->middleware('auth')->name('members.store');
Route::get('/edit/{user_id}', [MemberController::class, 'edit'])->middleware('auth')->name('members.edit');
Route::put('/update/{user_id}', [MemberController::class, 'update'])->middleware('auth')->name('members.update');
Route::delete('/destroy/{user_id}', [MemberController::class, 'destroy'])->middleware('auth')->name('members.destroy');

require __DIR__.'/auth.php';
