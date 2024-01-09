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
Route::get('/dashboard', [MessageController::class,'index'])->middleware(['auth'])->name('dashboard');

//誕生日メール：追加 
Route::post('/message',[MessageController::class,"store"])->name('message_store');

//誕生日メール：削除 
Route::delete('/message/{message}', [MessageController::class,"destroy"])->name('message_destroy');

//誕生日メール：更新画面
Route::post('/messageedit/{book}',[MessageController::class,"edit"])->name('message_edit'); //通常
Route::get('/mwedit/{book}', [MessageController::class,"edit"])->name('edit');      //Validationエラーありの場合

//本：更新画面
Route::post('/books/update',[BookController::class,"update"])->name('book_update');



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

Route::get('/message', function () {
    return view('message');
})->middleware(['auth', 'verified'])->name('message');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
