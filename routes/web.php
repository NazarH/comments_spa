<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

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

Route::prefix('/')->group(function () {
    Route::get('', [PageController::class, 'index'])->name('home.index');
    Route::post('send-form/{main?}/{answ?}', [PageController::class, 'send_form'])->name('home.send-form');

    Route::get('/storage', function () {\Artisan::call('storage:link');});
});
