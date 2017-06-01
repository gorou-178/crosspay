<?php

namespace Crosspay\Adapter;

use Crosspay\ChargeInterface;
use Crosspay\Config;
use Crosspay\EventInterface;
use Crosspay\CustomerInterface;
use Crosspay\SubscriptionInterface;

/**
 * Class NullAdapter
 * @package Crosspay\Adapter
 */
class NullAdapter extends AbstractAdapter
{
    /** @var Config config */
    private $config;

    /**
     * NullAdapter constructor.
     */
    public function __construct()
    {
        $this->config = new Config();
    }

    /**
     * @return CustomerInterface
     */
    public function customer() : CustomerInterface
    {
        return new NullCustomer($this->config);
    }

    /**
     * @return ChargeInterface
     */
    public function charge() : ChargeInterface
    {
        return new NullCharge($this->config);
    }

    /**
     * @return SubscriptionInterface
     */
    public function subscription() : SubscriptionInterface
    {
        return new NullSubscription($this->config);
    }

    /**
     * @return EventInterface
     */
    public function event() : EventInterface
    {
        return new NullEvent($this->config);
    }
}
