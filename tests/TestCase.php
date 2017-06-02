<?php

namespace Crosspay\Test;

use Dotenv\Dotenv;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected static function authorizeFromEnv()
    {
        $dotEnv = new Dotenv(dirname(__FILE__) . '/../');
        $dotEnv->load();
    }

}
