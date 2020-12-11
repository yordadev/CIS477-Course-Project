<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\AuthController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\LandingController;
use App\Http\Controllers\Functionality\AuthManager;
use App\Http\Controllers\Functionality\RemoveResume;
use App\Http\Controllers\Functionality\CreateResume;
use App\Http\Controllers\Functionality\UpdateResume;
use App\Http\Controllers\Functionality\CreateAttribute;
use App\Http\Controllers\Functionality\UpdateAttribute;
use App\Http\Controllers\Functionality\RemoveAttribute;
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

Route::get('/', [LandingController::class, 'render'])->name('landing');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'renderLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'renderRegister'])->name('register');

    Route::post('/login', [AuthManager::class, 'processLogin'])->name('post.login');
    Route::post('/register', [AuthManager::class, 'processRegisteration'])->name('post.register');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'render'])->name('home');
    Route::get('/logout', [AuthManager::class, 'processLogout'])->name('logout');


    Route::prefix('candidate')->group(function () {
        Route::post('resume', [CreateResume::class, 'process'])->name('post.candidate.resume');

        Route::prefix('resume')->group(function () {
            Route::post('update', [UpdateResume::class, 'process'])->name('post.candidate.resume.update');
            Route::post('remove', [RemoveResume::class, 'process'])->name('post.candidate.resume.remove');

            Route::prefix('attribute')->group(function () {
                Route::post('create', [CreateAttribute::class, 'process'])->name('post.candidate.resume.attribute.create');
                Route::post('update', [UpdateAttribute::class, 'process'])->name('post.candidate.resume.attribute.update');
                Route::post('remove', [RemoveAttribute::class, 'process'])->name('post.candidate.resume.attribute.remove');
            });
        });
    });

    Route::prefix('hiring')->group(function () {
        Route::post('job', [CreateJob::class, 'process'])->name('post.hiring.job');
    });
});
