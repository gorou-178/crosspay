<?php

namespace Crosspay\Test;

use Crosspay\AdapterInterface;
use Crosspay\ChargeInterface;
use Crosspay\CustomerInterface;
use \Crosspay\CrossPay;
use Crosspay\EventInterface;
use Crosspay\SubscriptionInterface;

class CrossPayTest extends TestCase
{
    /** @var CrossPay $crossPay */
    protected $crossPay;

    protected function setUp()
    {
        self::authorizeFromEnv();
        $this->crossPay = new CrossPay([
            'provider' => 'stripe',
            'api_key' => getenv('STRIPE_KEY'),
            'api_secret' => getenv('STRIPE_SECRET'),
            'api_version' => getenv('STRIPE_API_VERSION')
        ]);
    }

    public function testGetConfig()
    {
        $config = $this->crossPay->getConfig();
        $this->assertNotNull($config);
    }

    public function testAdapter()
    {
        $adapterInterface = $this->crossPay->adapter();
        $this->assertInstanceOf(AdapterInterface::class, $adapterInterface);
    }

    public function testCustomer()
    {
        $customerInterface = $this->crossPay->customer();
        $this->assertInstanceOf(CustomerInterface::class, $customerInterface);
    }

    public function testCharge()
    {
        $chargeInterface = $this->crossPay->charge();
        $this->assertInstanceOf(ChargeInterface::class, $chargeInterface);
    }

    public function testSubscription()
    {
        $subscriptionInterface = $this->crossPay->subscription();
        $this->assertInstanceOf(SubscriptionInterface::class, $subscriptionInterface);
    }

    public function testEvent()
    {
        $eventInterface = $this->crossPay->event();
        $this->assertInstanceOf(EventInterface::class, $eventInterface);
    }

}
