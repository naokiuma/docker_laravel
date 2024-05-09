<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	use HasFactory;
	//保存したいカラム名が複数の場合
	protected $fillable = ['isbn', 'title', 'price', 'publisher', 'published'];
	//タイムスタンプがないテーブルの場合は必要
	public $timestamps = false;

	//レビューテーブルへの参照関数
	//bookが多なので、複数形にする
	public function reviews()
	{
		return $this->hasMany(Review::class);
	}
}
