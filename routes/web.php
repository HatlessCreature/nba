<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;




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
    return redirect('/teams');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/teams', [TeamController::class, 'index']);
    Route::get('/teams/{team}', [TeamController::class, 'show'])->name('team');
    Route::post('/teams/{team}/comments', [CommentController::class, 'store'])->name('createComment')->middleware('forbiddenComment');
    Route::get('/players/{player}', [PlayerController::class, 'show'])->name('player');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/news', [NewsController::class, 'index']);
    Route::post('/news', [NewsController::class, 'store']);
    Route::get('/news/create', [NewsController::class, 'create']);
    Route::get('/news/{article}', [NewsController::class, 'show'])->name('article');
    Route::get('/news/team/{team}', [NewsController::class, 'getTeamNews'])->name('teamNews');
});
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'getRegisterForm']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'getLoginBlade']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});
