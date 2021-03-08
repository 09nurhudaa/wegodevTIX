<?php

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

Auth::routes();

//Group route Middleware
Route::middleware('auth')->group(function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\dashboard\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/theater', [App\Http\Controllers\dashboard\TheaterController::class, 'index'])->name('theaters');
    Route::get('/dashboard/ticket', [App\Http\Controllers\dashboard\TicketController::class, 'index'])->name('tickets');

    //Movies
    Route::get('/dashboard/movie', [App\Http\Controllers\dashboard\MovieController::class, 'index'])->name('movies');

    //users List
    Route::get('/dashboard/users', [App\Http\Controllers\dashboard\UsersController::class, 'index'])->name('users');
    //user Edit
    Route::get('/dashboard/users/{id}', [App\Http\Controllers\dashboard\UsersController::class, 'edit'])->name('edit');
    //user update
    Route::put('/dashboard/users/{id}', [App\Http\Controllers\dashboard\UsersController::class, 'update'])->name('update');
    //user delete
    Route::delete('/dashboard/users/{id}', [App\Http\Controllers\dashboard\UsersController::class, 'destroy'])->name('delete');
});
