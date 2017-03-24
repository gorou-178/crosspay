<?php

namespace crosspay;

use crosspay\adapter\AbstractAdapter;
use crosspay\adapter\Payment;
use WebPay\WebPay;

class WebPayAdapter extends AbstractAdapter
{
    public function createPayment($config)
    {
        $webPay = new WebPay($config->get('api_secret'));
        $webPayCustomer = new WebPayCustomer($webPay, $config);
        $webPayCharge = new WebPayCharge($webPay, $config);
        $webPaySubscription = new WebPaySubscription($webPay, $config);
        return new Payment($webPayCustomer, $webPayCharge, $webPaySubscription);
    }
}
