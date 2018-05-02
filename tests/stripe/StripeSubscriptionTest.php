<?php

namespace Crosspay\Test\Stripe;

use Crosspay\CrossPay;
use Crosspay\response\Customer;
use Crosspay\Test\CardBrand;
use Crosspay\Test\TestCard;
use Crosspay\Test\TestCase;

class StripeSubscriptionTest extends TestCase
{
    use TestCard;

    /** @var CrossPay */
    protected $crossPay;
    protected $testCardToken;
    /** @var Customer */
    protected $customer;

    public static function setUpBeforeClass()
    {
        self::authorizeFromEnv();
    }

    protected function setUp()
    {
        $this->crossPay = new CrossPay([
            'provider' => 'stripe',
            'api_key' => getenv('STRIPE_KEY'),
            'api_secret' => getenv('STRIPE_SECRET'),
            'api_version' => getenv('STRIPE_API_VERSION')
        ]);
        $this->testCardToken = $this->normalCardStripeToken(CardBrand::Visa());
    }

    protected function tearDown()
    {
        if ($this->customer) {
            $this->crossPay->customer()->delete($this->customer);
        }
    }

    public function testCreate()
    {

    }

    public function testSave()
    {

    }

    public function testRetrieve()
    {

    }

    public function testCancel()
    {

    }

    public function testAll()
    {

    }

}
