<?php


namespace Crosspay\Test;

use Crosspay\Config;

class ConfigTest extends TestCase
{

    public function testConfig()
    {
        $config = new Config([
            'api_key' => '12345',
            'api_secret' => 'secret_12345'
        ]);

        $this->assertEquals($config->get('api_key'), '12345');
        $this->assertTrue($config->has('api_key'));

        $this->assertEquals($config->get('dummy', 'default_value'), 'default_value');
        $this->assertFalse($config->has('dummy'));
        $this->assertNull($config->get('dummy'));

        $this->assertFalse($config->has('api_version'));
        $config->set('api_version', '1.0.0');
        $this->assertTrue($config->has('api_version'));
        $this->assertEquals($config->get('api_version'), '1.0.0');

        $emptyConfig = Config::emptyConfig();
        $this->assertFalse($emptyConfig->has('api_key'));
        $this->assertNull($emptyConfig->get('api_key'));
    }

}
