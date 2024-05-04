<!DOCTYPE html>
<html lang="ja">

<head>
	<metacharset="UTF8" />
	<!-- a.titleの置き場所 -->
	<title>@yield('title')</title>
	<!-- Bootstrapのインポート -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
</head>

<body>
	<img src="https: //wings.msn.to/image/wings.jpg" title="ロゴ" />
	<hr />
	<!-- mainコンテンツの置き場所 -->

	<!-- セクション〜showディレクティブ。 -->
	@section('main')

	<p>既定のコンテンツです。ビューに、mainのsectionとendsectionがない場合これが表示されます。</p>

	@show
	<hr />

	<p>Copyright(c)1998 2022,WINGSProject.All Right Reserved.</p>
</body>

</html>