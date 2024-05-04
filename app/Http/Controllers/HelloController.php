<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HelloController extends Controller
{
	public function view()
	{
		$data = [
			'msg' => 'こんにちは、世界！'
		];
		return view('hello.view', $data);
	}


	public function list()
	{
		$data = [
			'records' => Book::all()
		];
		// var_dump($data);
		return view('hello.list', $data);
	}

	public function escape()
	{
		// $data = [
		// 	'msg' => '<img src="https://wings.msn.to/image/wings.jpg" title="ロゴ"/><p>WINGSへようこそ</p>'
		// ];
		return view('hello.escape', ['msg' => '<img src="https://wings.msn.to/image/wings.jpg" title="ロゴ"/><p>WINGSへようこそ</p>']);
		// return view('hello.escape', $data);
	}

	public function if()
	{
		return view('hello.if');
	}

	public function master()
	{
		return view(
			'hello.master',
			[
				'msg' => 'こんにちは、世界 in master'
			]
		);
	}


	/**
	 * コンポーネントを呼び出すビュー
	 */
	public function comp()
	{
		$data = [
			'title'  => 'こんにちは世界 in comp'
		];
		return view('hello.comp', $data);
	}
}