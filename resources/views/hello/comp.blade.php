<!-- 利用する共通レイアウトを宣言 -->
@extends('layouts.base')
@section('title','compですよー^^')

<!-- sectionとendsectionの間にコンテンツ -->
@section('main')
<!-- コンポーネント自体がMyAlertというクラスなら、x-my-alertとなる。 -->
<!-- 属性値はケバブケースで。またビュー変数を渡すなら:で渡すこと -->
<x-my-alert type='success' :alert-title="$title">
	コンポーネント呼び出し元の記述です。ここで記載したものがslotとして表示されます。<br>
	<x-slot:footer>
		これはコンポーネントで$footerという記述箇所に表示されます
		</x-slot>
</x-my-alert>
@endsection('main')