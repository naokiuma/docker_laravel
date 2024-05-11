<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	use HasFactory;
	//保存したいカラム名が複数の場合
	protected $fillable = ['isbn', 'title', 'price', 'publisher', 'published'];

	//検証ルール
	public static $rules = [
		'isbn' => 'required',
		'title' => 'required|string|max:20',
		'price' => 'integer|min:0',
		'publisher' => 'required|in:走跳社,テックCode,ジャパンIT,優丸システム,ITEmotion,日経BP',
		'published' => 'required|date'
	];



	//タイムスタンプがないテーブルの場合は必要
	public $timestamps = false;

	//レビューテーブルへの参照関数
	//bookが多なので、複数形にする
	public function reviews()
	{
		return $this->hasMany(Review::class);
	}
}
