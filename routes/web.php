<?php

use App\Http\Controllers\Panel\PostController;
use App\Http\Livewire\Panel\About\AboutIndex;
use App\Http\Livewire\Panel\Category\CategoryIndex;
use App\Http\Livewire\Panel\Dashboard;
use App\Http\Livewire\Panel\Excul\ExculIndex;
use App\Http\Livewire\Panel\Post\{PostIndex, PostCreate, PostEdit};
use App\Http\Livewire\Panel\Settings\{SettingsGeneral, SettingsIndex};
use App\Http\Livewire\Panel\User\{UserIndex, UserCreate, UserEdit};
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
        Route::get('/edit/{id}', UserEdit::class)->name('edit');
    });

    Route::prefix('post')->name('post.')->group(function() {
        Route::get('/', PostIndex::class)->name('index');
        Route::get('/create', PostCreate::class)->name('create');
        Route::get('/edit/{id}', PostEdit::class)->name('edit');
    });

    Route::prefix('settings')->name('settings.')->group(function() {
        Route::get('/', SettingsIndex::class)->name('index');
        Route::get('/general', SettingsGeneral::class)->name('general');
    });
    
    Route::get('category', CategoryIndex::class)->name('category.index');
    Route::get('excul', ExculIndex::class)->name('excul.index');
    Route::get('about', AboutIndex::class)->name('about.index');

    Route::prefix('upload')->name('upload.')->group(function() {
        Route::post('/post', [PostController::class, 'uploadImage'])->name('post');
        Route::delete('/post', [PostController::class, 'deleteImage']);
    });
});

require __DIR__.'/auth.php';
