<?php

use Illuminate\Support\Facades\Route;

// CONTROLLER
// ------------
// HOME
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CollectionController;

// DASHBOARD
use App\Http\Controllers\Admin\DashboardController;

// MENU MANAGEMENT
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SubMenuController;

// GALLERY
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\VideoGalleryController;

// PROFILE ADMIN
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UpdatePasswordController;

// PROFILE USER
use App\Http\Controllers\User\ProfileUserController;
use App\Http\Controllers\User\UpdatePasswordUserController;

// ----------
// END CONTROLLER

// MODELS
// ........
use App\Models\PhotoGallery;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/collections/photo', [CollectionController::class, 'index'])
    ->middleware('auth', 'auth:sanctum', 'verified')
    ->name('collections-photo');

Route::get('/collections/video', [CollectionController::class, 'videos'])
    ->middleware('auth', 'auth:sanctum', 'verified')
    ->name('collections-video');

Route::prefix('admin')
    ->middleware('auth', 'admin', 'menu_active', 'verified')
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('admin-dashboard');

        Route::resource('menu', MenuController::class);
        Route::resource('sub-menu', SubMenuController::class);
        Route::resource('photos', PhotoGalleryController::class);
        Route::resource('videos', VideoGalleryController::class);

        Route::get('/profile', [ProfileController::class, 'index'])
            ->name('profile-index');

        Route::post('/profile/edit/{id}', [ProfileController::class, 'edit'])
                    ->name('profile-edit');

        Route::patch('/profile/edit', [ProfileController::class, 'update'])
                    ->name('profile-update');

        Route::get('/profile/password/edit', [UpdatePasswordController::class, 'edit'])
                    ->name('change-password');

        Route::patch('/profile/password/update', [UpdatePasswordController::class, 'update'])
                    ->name('update-password');
    });

Route::prefix('user')
    ->middleware('user' ,'auth', 'menu_active', 'verified')
    ->group(function() {
        Route::get('/', [ProfileUserController::class, 'index'])
            ->name('profile-user-index');

        Route::post('/profile/edit/{id}', [ProfileUserController::class, 'edit'])
                    ->name('profile-user-edit');

        Route::patch('/profile/edit', [ProfileUserController::class, 'update'])
                    ->name('profile-user-update');

        Route::get('/profile/password/edit', [UpdatePasswordUserController::class, 'edit'])
                    ->name('change-user-password');

        Route::patch('/profile/password/update', [UpdatePasswordUserController::class, 'update'])
                    ->name('update-user-password');
    });

Auth::routes();
// Route::middleware(['auth:sanctum', 'verified'])->get('/', [HomeController::class, 'index'])
//     ->name('dashboard');