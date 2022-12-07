<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ChangeEmailController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\SlackController;

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

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TasksController::class);
    
    // タスク一覧表示(未対応・対応中・完了タブ)
    Route::get('notWorking', [TasksController::class, 'notWorking'])->name('tasks.notWorking');
    Route::get('working', [TasksController::class, 'working'])->name('tasks.working');
    Route::get('finishWork', [TasksController::class, 'finishWork'])->name('tasks.finishWork');
    
    // メールアドレス変更処理
    Route::get('email_change', [ChangeEmailController::class, 'edit'])->name('email.form');
    Route::put('email_change', [ChangeEmailController::class, 'update'])->name('email.change');
    
    // パスワード変更処理
    Route::get('password_change', [ChangePasswordController::class, 'edit'])->name('password.form');
    Route::put('password_change', [ChangePasswordController::class, 'update'])->name('password.change');
    
    // slack設定処理
    Route::get('slack_setting', [SlackController::class, 'edit'])->name('slack.setting');
    Route::post('slack_save', [SlackController::class, 'save'])->name('slack.save');
    //Route::put('slack_setting', [SlackController::class, 'update'])->name('slack.change');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
