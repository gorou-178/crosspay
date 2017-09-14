<?php

namespace Crosspay\Test\Payjp;

use Crosspay\CrossPay;
use Crosspay\Test\CardBrand;
use Crosspay\Test\TestCard;
use Crosspay\Test\TestCase;
use Payjp\Token;

class PayjpCustomerTest extends TestCase
{
    use TestCard;

    /** @var CrossPay */
    protected $crossPay;
    protected $testCardToken;

    public static function setUpBeforeClass()
    {
        self::authorizeFromEnv();
    }

    protected function setUp()
    {
        $this->crossPay = new CrossPay([
            'provider' => 'payjp',
            'api_key' => getenv('PAYJP_KEY'),
            'api_secret' => getenv('PAYJP_SECRET'),
        ]);
        $this->testCardToken = Token::create([
            'card' => [
                'number' => $this->normalCardNumber(CardBrand::Visa()),
                'cvc' => '123',
                'exp_month' => '1',
                'exp_year' => '2020'
            ]
        ]);
    }

    protected function tearDown()
    {

    }

    public function testCreate()
    {
        $email = 'test@example.com';
        $customer = $this->crossPay->customer()->create([
            'email' => $email,
            'card' => $this->testCardToken,
        ]);

        $this->assertNotNull($customer);
        $this->assertNotNull($customer->id());
        $this->assertNotNull($customer->created());

        $this->assertEquals($customer->email(), $email);
        $this->assertEquals($customer->defaultCard()->brand(), CardBrand::Visa);
        $this->assertEquals($customer->defaultCard()->last4(), '4242');

        $amount = 1000;
        $currency = 'jpy';
        $chargeDescription = 'test charge';
        $charge = $this->crossPay->charge()->create([
            'customer' => $customer->id(),
            'amount' => $amount,
            'currency' => $currency,
            'description' => $chargeDescription
        ]);

        $this->assertNotNull($charge);
        $this->assertNotNull($charge->id());
        $this->assertNotNull($charge->created());

        $this->assertEquals($charge->currency(), $currency);
        $this->assertEquals($charge->amount(), $amount);
        $this->assertEquals($charge->customerId(), $customer->id());
        $this->assertEquals($charge->description(), $chargeDescription);
        $this->assertEquals($charge->card()->brand(), CardBrand::Visa);
        $this->assertEquals($charge->card()->last4(), '4242');

        $this->assertTrue($charge->captured());
        $this->assertFalse($charge->refunded());
    }

}
