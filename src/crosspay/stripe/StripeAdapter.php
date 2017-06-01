<?php

namespace Crosspay\Stripe;

use Crosspay\Adapter\AbstractAdapter;
use Crosspay\ChargeInterface;
use Crosspay\CustomerInterface;
use Crosspay\EventInterface;
use Crosspay\SubscriptionInterface;
use Stripe\Stripe;

class StripeAdapter extends AbstractAdapter
{
    protected $customer;
    protected $charge;
    protected $subscription;
    protected $event;

    public function __construct($config)
    {
        Stripe::setApiKey($config->get('api_key'));

        $this->customer = new StripeCustomer($config);
        $this->charge = new StripeCharge($config);
        $this->subscription = new StripeSubscription($config);
        $this->event = new StripeEvent($config);
    }

    /**
     * @return CustomerInterface
     */
    public function customer() : CustomerInterface
    {
        return $this->customer;
    }

    /**
     * @return ChargeInterface
     */
    public function charge() : ChargeInterface
    {
        return $this->charge;
    }

    /**
     * @return SubscriptionInterface
     */
    public function subscription() : SubscriptionInterface
    {
        return $this->subscription;
    }

    /**
     * @return EventInterface
     */
    public function event() : EventInterface
    {
        return $this->event;
    }
}
