<?php

namespace Crosspay\Payjp;

use Crosspay\Adapter\AbstractAdapter;
use Crosspay\ChargeInterface;
use Crosspay\CustomerInterface;
use Crosspay\EventInterface;
use Crosspay\SubscriptionInterface;
use Payjp\Payjp;

class PayjpAdapter extends AbstractAdapter
{
    protected $customer;
    protected $charge;
    protected $subscription;
    protected $event;

    public function __construct($config)
    {
        Payjp::setApiKey($config->get('api_secret'));

        $this->customer = new PayjpCustomer($config);
        $this->charge = new PayjpCharge($config);
        $this->subscription = new PayjpSubscription($config);
        $this->event = new PayjpEvent($config);
    }

    public function customer(): CustomerInterface
    {
        return $this->customer;
    }

    public function charge(): ChargeInterface
    {
        return $this->charge;
    }

    public function subscription(): SubscriptionInterface
    {
        return $this->subscription;
    }

    public function event(): EventInterface
    {
        return $this->event;
    }
}
