<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReadmeController;
use App\Http\Controllers\SettingsController;
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

Route::get('/', HomeController::class)->name('home');
Route::get('/readme', ReadmeController::class)->name('readme');

Route::middleware('initialized')->group(function () {
	Route::get('/dashboard', [DashboardController::class, 'show'])
		->name('dashboard');
	Route::get('/dashboard/terminal', [DashboardController::class, 'terminal'])
		->name('dashboard.terminal');
	Route::get('/dashboard/browser', [DashboardController::class, 'browser'])
		->name('dashboard.browser');


	Route::resource('/dashboard/posts', PostController::class);

	Route::resource('/dashboard/settings', SettingsController::class)->only(['index', 'update', 'destroy']);
});
