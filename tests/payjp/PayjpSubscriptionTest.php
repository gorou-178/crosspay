<?php

namespace Crosspay\Test\Payjp;

use Crosspay\CrossPay;
use Crosspay\response\Customer;
use Crosspay\Test\CardBrand;
use Crosspay\Test\TestCard;
use Crosspay\Test\TestCase;
use Payjp\Token;

class PayjpSubscriptionTest extends TestCase
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

    public static function tearDownAfterClass()
    {

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
