<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ChangeEmailController;
use App\Http\Controllers\ChangePasswordController;

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

// ログインor未ログイン判定
Route::get('/', [TasksController::class, 'index']);

Route::resource('change_email', ChangeEmailController::class);

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TasksController::class);
    
    Route::get('notWorking', [TasksController::class, 'notWorking'])->name('tasks.notWorking');
    Route::get('finishWork', [TasksController::class, 'finishWork'])->name('tasks.finishWork');
    
    Route::get('password_change', [ChangePasswordController::class, 'edit'])->name('password.form');
    Route::put('password_change', [ChangePasswordController::class, 'update'])->name('password.change');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
