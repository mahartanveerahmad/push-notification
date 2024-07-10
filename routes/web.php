<?php

use App\Events\testingEvent;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    event(new testingEvent('hello world'));
    return 'done';
});
Route::post('/select-option', [OptionController::class, 'selectOption']);

Route::get('/other', function () {
    return view('other');
});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/pusher', function () {
    return view('pusher');
});

Route::get('post',[PostController::class, 'index']);
Route::post('post',[PostController::class, 'save'])->name('post.save');