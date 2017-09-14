<?php


namespace Crosspay\Test;

use Crosspay\Config;

class ConfigTest extends TestCase
{

    private $config;

    public function setUp()
    {
        $this->config = new Config([
            'api_key' => '12345',
            'api_secret' => 'secret_12345'
        ]);
    }

    public function testGet()
    {
        $this->assertEquals($this->config->get('api_key'), '12345');
        $this->assertEquals($this->config->get('dummy', 'default_value'), 'default_value');
        $this->assertNull($this->config->get('dummy'));
    }

    public function testHas()
    {
        $this->assertTrue($this->config->has('api_key'));
        $this->assertFalse($this->config->has('dummy'));
    }

    public function testEmptyConfig()
    {
        $emptyConfig = Config::emptyConfig();
        $this->assertFalse($emptyConfig->has('api_key'));
        $this->assertNull($emptyConfig->get('api_key'));
    }

}
