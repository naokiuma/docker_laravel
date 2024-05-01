<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;


Route::get('/', function () {
	// Cache::set('test', 'yaa');
	return view('welcome');
});

Route::get('/cache', function () {
	// return Cache::get('test');
});

Route::get('/responce', function () {
	return response()->json([
		'test' => 1
	]);
});
