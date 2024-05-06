## ディレクティブ

ループ内、こういうので何コメの数字かにもアクセスできる
```
{{$loop->iteration}}
```

```
<?php $isEnabled = true;?>
<div @class([
	'column',
	'notice'=>$isEnabled,
	'example'=>!$isEnabled,])>
	classディレクティブ
</div>

```

なお、hello.blade.phpというテンプレートではなく、シンプルにhello.phpでも使える。<br>
この場合はディレクティブは使えない。

## コンポーネント
以下を実行。

```
./vendor/bin/sail artisan make:component MyAlert
```
クラスとしての View/Components/MyAlert.php　と<br>
resources/views/components/my-alert.blade.phpが作られる。<br>
使っているのはhelloのcompクラスです。そちらを参考に。<br>
また、dynamicコンポーネントという動的コンポーネントクラスや、<br>
```
<x-dynamic-component :component="$componentName" class="mt-4" />
```
サブビュー(インクルードで普通に使う)ものもあります。

## レスポンスオブジェクトについて
helloコントローラーの responce_test を参照
## リクエストオブジェクトについて
アクションの引数に「Request $req」などを追加するのみ。<br>
formの送信値もこの$reqから取得できる。例えば以下なら、requestのnameの送信を取得できる。

```
public function hoge(Request $req)
{
	$name = $req->name;
}
```

## formのおまじない
@csrf
<from>の下に記載しておこう。