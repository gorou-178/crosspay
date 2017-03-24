<?php

namespace crosspay;

use crosspay\adapter\AbstractAdapter;
use crosspay\adapter\Payment;

class CrossPay implements CrossPayInterface
{
    use ConfigTrait;

    /** @var Payment */
    private $payment;

    public function __construct(AbstractAdapter $adapter, $config)
    {
        $this->setConfig($config);
        $this->payment = $adapter->createPayment($config);
    }

    public function payment()
    {
        return $this->payment;
    }
}
