<?php

namespace crosspay\adapter;

use crosspay\ChargeInterface;
use crosspay\CustomerInterface;
use crosspay\PaymentInterface;
use crosspay\SubscriptionInterface;

class Payment implements PaymentInterface
{
    protected $customer;
    protected $charge;
    protected $subscription;

    /**
     * Payment constructor.
     * @param $customer
     * @param $charge
     * @param $subscription
     */
    public function __construct($customer, $charge, $subscription)
    {
        $this->customer = $customer;
        $this->charge = $charge;
        $this->subscription = $subscription;
    }

    /**
     * @return CustomerInterface
     */
    public function customer()
    {
        return $this->customer;
    }

    /**
     * @return ChargeInterface
     */
    public function charge()
    {
        return $this->charge;
    }

    /**
     * @return SubscriptionInterface
     */
    public function subscription()
    {
        return $this->subscription;
    }
}
