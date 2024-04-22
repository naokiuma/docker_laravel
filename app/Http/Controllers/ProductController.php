<?php

namespace App\Http\Controllers;

use App\Enums\NewsletterUserActionType;
use App\Models\NewsletterUser;
use App\Models\NewsletterUserAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;

/**
 * /product/1 or /product/2などでアクセス
 */
class ProductController extends Controller
{
    public function show(Request $request, $id) // 本来はここに商品モデルをバインティングしますが、今回は省略します
    {
	

		$test = NewsletterUserActionType::Sns_Sales_Viewed;


        $newsletter_uuid = $request->cookie('newsletter_uuid');
		var_dump($newsletter_uuid);



        $newsletter_user = NewsletterUser::where('uuid', $newsletter_uuid)->first();
		// var_dump($newsletter_user);


        if(! is_null($newsletter_user)) {
			var_dump('こちら');

            // 本来この部分はミドルウェアなどで共通化するべきですが、今回は省略します。
            // またこの部分は可変にするべきです

            if(intval($id) === 1) { // SNS集客に関するページを想定してます

				// DB::enableQueryLog();
                // 一番最初に商品ページを見たデータを取得する
                $oldest_action = NewsletterUserAction::query()
                    ->where('newsletter_user_id', $newsletter_user->id)
                    ->where('action_type', NewsletterUserActionType::Sns_Sales_Viewed)
                    ->oldest()
                    ->first();

				// dd(DB::getQueryLog());
                if(! is_null($oldest_action)) {

                    if($oldest_action->created_at->diffInDays() >= 7) { // 初めて商品ページを見てから7日以上経過しているか？

                        // 割引クーポンつきメールを送信（本来は Mailable を使うべきです）
                        $mail_body = 'ここに割引クーポンつきメールの本文を記述します。';
                        Mail::raw($mail_body, function ($message) use ($newsletter_user) {

                            $to = $newsletter_user->email;
                            $message
                                ->to($to)
                                ->subject('【Sukohi Web Service】期間限定クーポンのご案内 ●月●日まで！');

                        });

                    }

                }

                // ユーザーの行動は無条件で記録する（今後の分析のため）
                $newsletter_user_action = new NewsletterUserAction();
                $newsletter_user_action->newsletter_user_id = $newsletter_user->id;
                $newsletter_user_action->action_type = NewsletterUserActionType::Sns_Sales_Viewed;
                $newsletter_user_action->save();

                return '商品ページが表示されます（行動履歴が保存されました）';

            }

        }

        return '商品ページが表示されます（行動履歴は保存されていません）';
    }

    public function set_cookie()
    {
        // テスト用で Cookie をセットする
        // 本来はメルマガ登録時にセットするべき

        $uuid = 'taro0000-0000-0000-0000-000000000000';
        $minutes = 60 * 24 * 365 * 10; // 10年間有効

        return response('Cookie がセットされました', 200)
            ->cookie('newsletter_uuid', $uuid, $minutes);
    }
}