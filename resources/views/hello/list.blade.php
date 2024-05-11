<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF8" />
	<title>速習Laravel</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
</head>

<style>
	.test {
		color: red;
	}
</style>

<body>
	<table class="table">
		<tr>
			<th>書名</th>
			<th>価格</th>
			<th>出版社</th>
			<th>刊行日</th>
			<th></th>
		</tr>
		@foreach($records as $record)
		<tr>
			<td>{{$record -> title}}</td>
			<td>{{$record -> price}}円</td>
			<td>{{$record -> publisher}}</td>
			<td class="<?php echo $loop->iteration === 2 ? 'test' : ''; ?>">{{$record -> published}}</td>
			<td>
				<a href="/hello/{{$record->id}}/edit">編集</a>
				<a href="/hello/{{$record->id}}">削除</a>
			</td>
		</tr>
		<!-- こういうので何コメの数字かにもアクセスできる -->
		{{$loop->iteration}}
		@endforeach
	</table>

	@foreach($records as $key => $val)
	{{$key}}:{{$val->title}}
	@endforeach

	動作確認
	<?php $isEnabled = true; ?>
	<div @class([ 'column' , 'notice'=>$isEnabled,
		'example'=>!$isEnabled,])>
		classディレクティブ
	</div>
</body>

</html>