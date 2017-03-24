<?php

namespace Crosspay;

use Crosspay\Adapter\AbstractAdapter;
use WebPay\WebPay;

class WebPayAdapter extends AbstractAdapter
{
    protected $webPay;
    protected $customer;
    protected $charge;
    protected $subscription;

    public function __construct(Config $config)
    {
        $this->webPay = new WebPay($config->get('api_secret'));
        $this->customer = new WebPayCustomer($this->webPay, $config);
        $this->charge = new WebPayCharge($this->webPay, $config);
        $this->subscription = new WebPaySubscription($this->webPay, $config);
    }

    public function getProvider()
    {
        return $this->webPay;
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
