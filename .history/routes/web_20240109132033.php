<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MessageController;
use App\Models\Book;

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

//誕生日メール：ダッシュボード表示(message.blade.php)
Route::get('/message', [MessageController::class,'index'])->middleware(['auth'])->name('message_index');

//誕生日メール：追加
Route::post('/message',[MessageController::class,"store"])->name('message_store');

//誕生日メール：削除
Route::delete('/message/{message}', [MessageController::class,"destroy"])->name('message_destroy');

//本：更新画面
Route::post('/message/update',[MessageController::class,"update"])->name('message_update');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/familytree', function () {
    return view('familytree');
})->middleware(['auth', 'verified'])->name('familytree');

Route::get('/will', function () {
    return view('will');
})->middleware(['auth', 'verified'])->name('will');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
