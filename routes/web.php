<?php

use App\Http\Middleware\AdminAuthenticate;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\FandomController;
use App\Http\Controllers\Admin\ThematicController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\App\NewsController as AppNewsController;
use App\Http\Controllers\App\LoginController as AppLoginController;
use App\Http\Controllers\App\HomeController;
use App\Http\Controllers\App\PersonalController;
use App\Http\Controllers\App\ExecutantController;
use App\Http\Controllers\App\Personal\GarbController as PersonalGarbController;

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

Route::get('/main', [HomeController::class, 'index'])->name('main');
Route::get('/filter', [HomeController::class, 'filter'])->name('filter');

Route::group(['prefix' => 'executant'], function () {
    Route::get('/', [ExecutantController::class, 'index'])->name('executant_index');
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AppLoginController::class, 'loginForm'])->name('public_login_form');
    Route::get('/register', [AppLoginController::class, 'registerForm'])->name('public_register_form');
    Route::post('/login', [AppLoginController::class, 'login'])->name('public_login');
    Route::post('/register', [AppLoginController::class, 'register'])->name('public_register');
});

Route::group(['prefix' => 'personal', 'middleware' => 'auth'], function () {
    Route::get('/settings', [PersonalController::class, 'settingsForm'])->name('personal_settings');
    Route::post('/settings', [PersonalController::class, 'update'])->name('personal_settings_update');

    Route::group(['namespace' => 'admin'], function () {
        Route::group(['prefix' => 'garb'], function () {
            Route::get('/', [PersonalGarbController::class, 'index'])->name('personal_garb_index');
            Route::get('/create', [PersonalGarbController::class, 'create'])->name('personal_garb_create');
            Route::post('/store', [PersonalGarbController::class, 'store'])->name('personal_garb_store');
            Route::get('/update/{garb}', [PersonalGarbController::class, 'detail'])->name('personal_garb_detail');
            Route::post('/update/{garb}', [PersonalGarbController::class, 'update'])->name('personal_garb_update');
            Route::delete('/delete/{garb}', [PersonalGarbController::class, 'delete'])->name('personal_garb_delete');
        });
    });
});


Route::group(['prefix' => 'news'], function () {
    Route::get('/', [AppNewsController::class, 'index'])->name('public_news_index');
    Route::get('/{news}', [AppNewsController::class, 'detail'])->name('public_news_detail');
});


Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'loginForm'])->name('login_form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
//    Route::get('/register', [LoginController::class, 'registerForm'])->name('register_form');
//    Route::post('/register', [LoginController::class, 'register'])->name('register');

    Route::group(['middleware' => 'auth.admin', 'namespace' => 'admin'], function () {
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

        Route::group(['prefix' => 'news'], function () {
            Route::get('/', [NewsController::class, 'index'])->name('news_index');
            Route::get('/create', [NewsController::class, 'create'])->name('news_create');
            Route::post('/store', [NewsController::class, 'store'])->name('news_store');
            Route::get('/update/{news}', [NewsController::class, 'detail'])->name('news_detail');
            Route::post('/update/{news}', [NewsController::class, 'update'])->name('news_update');
            Route::get('/delete/{news}', [NewsController::class, 'delete'])->name('news_delete');
            Route::post('/image/store', [NewsController::class, 'storeImage'])->name('news_image_store');
        });
    });

});
