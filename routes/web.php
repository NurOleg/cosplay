<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\FandomController;
use App\Http\Controllers\Admin\ThematicController;
use App\Http\Controllers\Admin\HeroController;

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


Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'loginForm'])->name('login_form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
//    Route::get('/register', [LoginController::class, 'registerForm'])->name('register_form');
//    Route::post('/register', [LoginController::class, 'register'])->name('register');

    Route::group(['middleware' => 'auth', 'namespace' => 'admin'], function () {
        Route::group(['prefix' => 'fandom'], function () {
            Route::get('/', [FandomController::class, 'index'])->name('fandom_index');
            Route::get('/create', [FandomController::class, 'create'])->name('fandom_create');
            Route::post('/store', [FandomController::class, 'store'])->name('fandom_store');
            Route::get('/update/{fandom}', [FandomController::class, 'detail'])->name('fandom_detail');
            Route::post('/update/{fandom}', [FandomController::class, 'update'])->name('fandom_update');
            Route::delete('/delete/{fandom}', [FandomController::class, 'delete'])->name('fandom_delete');
        });

        Route::group(['prefix' => 'thematic'], function () {
            Route::get('/', [ThematicController::class, 'index'])->name('thematic_index');
            Route::get('/create', [ThematicController::class, 'create'])->name('thematic_create');
            Route::post('/store', [ThematicController::class, 'store'])->name('thematic_store');
            Route::get('/update/{thematic}', [ThematicController::class, 'detail'])->name('thematic_detail');
            Route::post('/update/{thematic}', [ThematicController::class, 'update'])->name('thematic_update');
            Route::delete('/delete/{thematic}', [ThematicController::class, 'delete'])->name('thematic_delete');
        });

        Route::group(['prefix' => 'hero'], function () {
            Route::get('/', [HeroController::class, 'index'])->name('hero_index');
            Route::get('/create', [HeroController::class, 'create'])->name('hero_create');
            Route::post('/store', [HeroController::class, 'store'])->name('hero_store');
            Route::get('/update/{hero}', [HeroController::class, 'detail'])->name('hero_detail');
            Route::post('/update/{hero}', [HeroController::class, 'update'])->name('hero_update');
            Route::delete('/delete/{hero}', [HeroController::class, 'delete'])->name('hero_delete');
        });
    });

});
