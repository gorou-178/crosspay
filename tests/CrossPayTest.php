<?php

use \PHPUnit\Framework\TestCase;
use Crosspay\CrossPay;

class CrossPayTest extends TestCase
{
    public function testPayment()
    {
        $crossPay = new CrossPay([
            'provider' => 'stripe',
            'api_key' => 'xxxx',
            'api_secret' => 'xxxx',
        ]);

        // カスタマー作成
        $customer = $crossPay->customer()->create([
            'email' => 'hoge@example.com',
            'token' => 'xxxx'
        ]);
        // メールアドレス取得
        $email = $customer->email();
        // カード下4桁取得
        $cardLast4 = $customer->card()->last4();

        // 定期課金作成
        $subscription = $crossPay->subscription()->create([
            'customer' => $customer->id(),
            'plan' => 'hogehoge'
        ]);

        // 定期課金アイテム取得
        $plan = $subscription->plan();

        // アイテム名取得
        $planName = $plan->name();

        // 単発課金
        $charge = $crossPay->charge()->create([
            'amount' => 100,
            'currency' => 'jpy',
            'customer' => $customer->id()
        ]);

        // 失敗コード取得
        $failureCode = $charge->failure_code();

        // ユーザー検索
        $customer = $crossPay->customer()->retrieve('cus_xxxx');

        // 返金
        $refund = $crossPay->charge()->refund([
            'amount' => 50,
            'reason' => 'hogehoge'
        ]);

        // 返金した日付
        $refundTime = $refund->created();

        // イベント取得
        $event = $crossPay->event()->retrieve('event_xxxx');

        // イベントタイプ取得
        $type = $event->type();
    }
}
