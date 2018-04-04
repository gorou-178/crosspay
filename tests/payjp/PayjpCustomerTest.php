<?php

namespace Crosspay\Test\Payjp;

use Crosspay\CrossPay;
use Crosspay\response\Customer;
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
        $email = 'test@example.com';
        $description = 'crosspay test description';
        $this->customer = $this->crossPay->customer()->create([
            'email' => $email,
            'card' => $this->testCardToken,
            'description' => $description
        ]);

        $this->assertNotNull($this->customer);
        $this->assertNotNull($this->customer->id());
        $this->assertNotNull($this->customer->created());
        $this->assertNotNull($this->customer->cards());


        $this->assertNotNull($this->customer->toArray());
        $this->assertJson($this->customer->toJson());

        $this->assertEquals($this->customer->email(), $email);
        $this->assertEquals($this->customer->description(), $description);
        $this->assertEquals($this->customer->defaultCard()->brand(), CardBrand::Visa);
        $this->assertEquals($this->customer->defaultCard()->last4(), '4242');
    }

    public function testAll()
    {
        $description = 'crosspay test description';
        $customer1 = $this->crossPay->customer()->create([
            'email' => 'test1@example.com',
            'card' => $this->testCardToken,
            'description' => $description
        ]);
        $customer2 = $this->crossPay->customer()->create([
            'email' => 'test2@example.com',
            'card' => $this->testCardToken,
            'description' => $description
        ]);
        $customer3 = $this->crossPay->customer()->create([
            'email' => 'test3@example.com',
            'card' => $this->testCardToken,
            'description' => $description
        ]);

        $listLimit = 2;
        $collection = $this->crossPay->customer()->all([
            'limit' => $listLimit
        ]);
        $this->assertNotNull($collection);
        $this->assertEquals($collection->count(), $listLimit);
        $this->assertNotNull($collection->url());
        $this->assertTrue($collection->hasMore());

        $this->assertEquals($collection->data()[0]->id(), $customer1->id());
        $this->assertEquals($collection->data()[1]->id(), $customer2->id());
    }

    public function testRetrieve()
    {
        $email = 'test@example.com';
        $this->customer = $this->crossPay->customer()->create([
            'email' => $email,
            'card' => $this->testCardToken,
        ]);

        $customer = $this->crossPay->customer()->retrieve($this->customer->id());
        $this->assertNotNull($customer);
        $this->assertEquals($customer->id(), $this->customer->id());
    }

    public function testSave()
    {
        $email = 'test@example.com';
        $this->customer = $this->crossPay->customer()->create([
            'email' => $email,
            'card' => $this->testCardToken,
        ]);

        $newEmail = 'update@example.com';
        $updateCustomer = $this->crossPay->customer()->save($this->customer, [
            'email' => $newEmail
        ]);

        $this->assertNotNull($updateCustomer);
        $this->assertEquals($updateCustomer->email(), $newEmail);
    }

    public function testDelete()
    {
        $email = 'test@example.com';
        $this->customer = $this->crossPay->customer()->create([
            'email' => $email,
            'card' => $this->testCardToken,
        ]);

        $deleteCustomer = $this->crossPay->customer()->delete($this->customer);
        $this->assertNotNull($deleteCustomer);
        $this->assertEquals($deleteCustomer->id(), $this->customer->id());
    }

}
