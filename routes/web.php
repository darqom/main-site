<?php

use App\Http\Livewire\Panel\Dashboard;
use App\Http\Livewire\Panel\User\UserCreate;
use App\Http\Livewire\Panel\User\UserIndex;
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

Route::prefix('panel')->name('panel.')->middleware('auth')->group(function() {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    
    Route::prefix('user')->name('user.')->group(function() {
        Route::get('/', UserIndex::class)->name('index');
        Route::get('/create', UserCreate::class)->name('create');
    });
});

require __DIR__.'/auth.php';
