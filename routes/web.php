<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\RouteController;



Route::get('/', function () {
	return view('welcome');
});

Route::get('/folders/{id}/tasks', [TaskController::class, 'index'])->name('tasks,index');

// Route::get('/hello', [HelloController::class, 'view']);
// Route::get('/hello/list', [HelloController::class, 'list']);
// Route::get('/hello/escape', [HelloController::class, 'escape']);
// Route::get('/hello/if', [HelloController::class, 'if']);
// Route::get('/hello/master', [HelloController::class, 'master']);
// Route::get('/hello/comp', [HelloController::class, 'comp']);
// ↑これは、、、


// ↓こうまとめられる
Route::controller(HelloController::class)->group(function () {
	Route::get('/hello', 'view');
	Route::get('/hello/list', 'list');
	Route::get('/hello/{id}/edit', 'edit');
	Route::patch('/hello/{id}', 'update');

	Route::get('/hello/escape', 'escape');
	Route::get('/hello/if', 'if');
	Route::get('/hello/master', 'master');
	Route::get('/hello/comp', 'comp');
	Route::get('/hello/responce_test', 'responce_test');
	Route::get('/hello/request_test', 'request_test');
	Route::get('/hello/hasmany', 'hasmany');
	Route::get('/hello/create', 'create');
	Route::post('/hello/store', 'store');
});

//whereで引数に桁数などを指定できる
Route::get('/route/{id?}', [RouteController::class, 'index']);
	// ->where(['id' => '[0-9]{2,3}']);
//RouteServiceProvider に
// Route::pattern('id','[0-9]{2,3}');
//と書けば、ルーティングのすべての数字に対して、この指定をできる。








// Route::get('/hello', '\App\Http\Controllers\HelloController@view');
