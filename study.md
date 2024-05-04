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

