<?php

namespace Crosspay\Test\Stripe;

use Crosspay\CrossPay;
use Crosspay\Test\CardBrand;
use Crosspay\Test\TestCard;
use Crosspay\Test\TestCase;

class StripeCustomerTest extends TestCase
{
    use TestCard;

    /** @var CrossPay */
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

    public function testCreate()
    {
        $customer = $this->crossPay->customer()->create([
            'email' => 'test@example.com',
            'source' => self::normalCardToken(CardBrand::Visa())
        ]);
        $this->assertNotNull($customer);
    }

}
