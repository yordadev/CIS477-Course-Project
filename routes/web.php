<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\AuthController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\LandingController;
use App\Http\Controllers\Functionality\AuthManager;
use App\Http\Controllers\Functionality\CreateResume;
use App\Http\Controllers\Functionality\UpdateAttribute;
use App\Http\Controllers\Functionality\UpdateResume;

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

    Route::post('/candidate/resume', [CreateResume::class, 'process'])->name('post.candidate.resume');
    Route::post('/candidate/resume/update', [UpdateResume::class, 'process'])->name('post.candidate.resume.update');
    Route::post('/candidate/resume/attribute/update', [UpdateAttribute::class, 'process'])->name('post.candidate.resume.attribute.update');
});
