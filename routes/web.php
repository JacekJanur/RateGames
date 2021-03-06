<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserExists;
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

Route::get('/', [GameController::class, 'index'])->name('home');
//Route::get('/game/{id}', [GameController::class, 'showGame'])->middleware(['CheckGameExists']);

Route::middleware([CheckGameExists::class])->group(function () {
        Route::get('/game/{id}', [GameController::class, 'showGame']);

        Route::post('/game/{id}/comments', [CommentController::class, 'store'])->middleware('auth');

        Route::post('/game/{id}/rates', [RateController::class, 'store'])->middleware('auth');

        Route::post('/game/{id}/comments/{comment_id}/delete', [CommentController::class, 'delete'])->middleware('auth');

    });

Route::get('/user/{id}', [UserController::class, 'index'])->name('user')->middleware([CheckUserExists::class]);

Route::get('/popular', [GameController::class, 'popular'])->name('popular');

Route::get('/popular/{category}', [GameController::class, 'popular'])->name('popularCat');

Route::get('/commented', [GameController::class, 'commented'])->name('commented');

Route::get('/commented/{category}', [GameController::class, 'commented'])->name('commentedCat');

Route::get('/best-year/{year}', [GameController::class, 'bestByYear'])->name('bestYear');

// AUTH

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post("/login", [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post("/register", [RegisterController::class, 'store']);

Route::post("/logout", [LogoutController::class, 'logout'])->name('logout');