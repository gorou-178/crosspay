<?php

namespace Crosspay\Test;

use Crosspay\CustomerInterface;
use \PHPUnit\Framework\TestCase;
use \Crosspay\CrossPay;
use \Dotenv\Dotenv;

class CrossPayTest extends TestCase
{

    /** @var CrossPay $crossPay */
    protected $crossPay;

    protected function setUp()
    {
        $dotEnv = new Dotenv(dirname(__FILE__) . '/../');
        $dotEnv->load();

        $this->crossPay = new CrossPay([
            'provider' => 'stripe',
            'api_key' => getenv('STRIPE_KEY'),
            'api_secret' => getenv('STRIPE_SECRET'),
        ]);
    }

    public function testGetConfig()
    {
        $config = $this->crossPay->getConfig();
        $this->assertNotNull($config);
    }

    public function testCustomer()
    {
        $customerInterface = $this->crossPay->customer();
        $this->assertInstanceOf(CustomerInterface::class, $customerInterface);
    }

}
