<?php

namespace crosspay;

use crosspay\adapter\AbstractAdapter;
use crosspay\adapter\NullCharge;
use crosspay\adapter\NullCustomer;
use crosspay\adapter\NullProvider;
use crosspay\adapter\NullSubscription;
use crosspay\adapter\Payment;

class NullAdapter extends AbstractAdapter
{

    function createPayment($config)
    {
        $nullProvider = new NullProvider();
        return new Payment(new NullCustomer($nullProvider, $config), new NullCharge($nullProvider, $config),
            new NullSubscription($nullProvider, $config));
    }
}
