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


	/**
	 * レスポンスの記述のテスト
	 */
	public function responce_test()
	{
		$data = [
			'msg'  => 'こんにちは世界 in header'
		];
		//httpパラメータの指定
		// return response()->view('hello.view', $data, 305);
		// return response()->view('hello.view', $data, 404);
		// return response()->view('hello.view', $data, 200);

		//contentsタイプの指定
		// return response()->view('hello.view', $data, 200)
		// 	->header('Content-Type', 'text/xml');

		//json形式で返す
		return response()->json([
			'name' => 'Yoshihiro,YAMADA',
			'sex' => 'male',
			'age' => 18,
		]);
	}

	/**
	 * リクエストテスト
	 */
	public function request_test(Request $req)
	{
		// dd($req);
		return request()->path();
	}


	public function hasmany()
	{
		return view('hello.hasmany', [
			'book' => Book::find(1)
		]);
	}


	//フォーム
	public function create()
	{
		return view('hello.create');
	}

	public function store(Request $req)
	{
		// dd($req);
		$data = new Book;

		//バリデーション
		$req->validate(Book::$rules);

		//この値以外を保存する
		$data->fill($req->except('_token'))->save();
		return redirect('hello/create');
		// return view('hello.create');
	}

	// 編集画面
	public function edit($id)
	{
		return view('hello.edit', [
			'book' => Book::findOrFail($id)
		]);
	}

	//更新
	public function update(Request $req, $id)
	{
		// dd($req);
		$book = Book::findOrFail($id);
		$result = $req->validate(Book::$rules);

		$book->fill($req->except('_token', '_method'))->save();

		return redirect('hello/list');
	}

	//削除
	public function destory(Request $id)
	{
		// dd($req);
		$book = Book::findOrFail($id);
		$book->delete();

		return redirect('hello/list');
	}
}
