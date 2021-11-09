<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
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

Route::group([
    'prefix' => 'panel',
    'as' => 'panel.',
    'middleware' => 'auth'
] ,function() {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::resource('user', UserController::class);
});

require __DIR__.'/auth.php';
