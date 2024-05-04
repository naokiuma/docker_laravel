<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HelloController;


Route::get('/', function () {
	return view('welcome');
});

Route::get('/folders/{id}/tasks', [TaskController::class, 'index'])->name('tasks,index');

Route::get('/hello', [HelloController::class, 'view']);
Route::get('/hello/list', [HelloController::class, 'list']);
Route::get('/hello/escape', [HelloController::class, 'escape']);
Route::get('/hello/if', [HelloController::class, 'if']);
Route::get('/hello/master', [HelloController::class, 'master']);
Route::get('/hello/comp', [HelloController::class, 'comp']);






// Route::get('/hello', '\App\Http\Controllers\HelloController@view');
