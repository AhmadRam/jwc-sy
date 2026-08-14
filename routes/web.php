<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirect root to Arabic version
Route::get('/', function () {
    return redirect('/ar');
});

// Language Routes with Localization
Route::group(['prefix' => 'ar', 'middleware' => ['web']], function () {
    // Set locale for Arabic routes
    Route::get('/', function () {
        app()->setLocale('ar');
        return app()->make(Controller::class)->index();
    })->name('index');

    Route::get('/packages', function () {
        app()->setLocale('ar');
        return app()->make(Controller::class)->packages();
    })->name('packages');

    // Service details route
    Route::get('/service/{service}', function ($service) {
        app()->setLocale('ar');
        return app()->make(Controller::class)->serviceDetails($service);
    })->name('service.details');

    // Blog routes
    Route::get('/blog', function () {
        app()->setLocale('ar');
        return app()->make(\App\Http\Controllers\BlogController::class)->index();
    })->name('blog.index');

    Route::get('/blog/{slug}', function ($slug) {
        app()->setLocale('ar');
        return app()->make(\App\Http\Controllers\BlogController::class)->show($slug);
    })->name('blog.show');
});

Route::group(['prefix' => 'en', 'middleware' => ['web']], function () {
    // Set locale for English routes
    Route::get('/', function () {
        app()->setLocale('en');
        return app()->make(Controller::class)->index();
    })->name('index_en');

    Route::get('/packages', function () {
        app()->setLocale('en');
        return app()->make(Controller::class)->packages();
    })->name('packages_en');

    // Service details route for English
    Route::get('/service/{service}', function ($service) {
        app()->setLocale('en');
        return app()->make(Controller::class)->serviceDetails($service);
    })->name('service.details_en');

    // Blog routes for English
    Route::get('/blog', function () {
        app()->setLocale('en');
        return app()->make(\App\Http\Controllers\BlogController::class)->index();
    })->name('blog.index_en');

    Route::get('/blog/{slug}', function ($slug) {
        app()->setLocale('en');
        return app()->make(\App\Http\Controllers\BlogController::class)->show($slug);
    })->name('blog.show_en');
});

// Contact Form Route
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');
Route::post('/package-request', [ContactController::class, 'sendPackageRequest'])->name('package.request');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->except(['show', 'edit', 'update']);
        Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class)->except(['show']);
        Route::post('/blogs/upload-image', [\App\Http\Controllers\Admin\BlogController::class, 'uploadImage'])->name('blogs.uploadImage');
    });
});
