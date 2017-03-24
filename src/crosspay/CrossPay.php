<?php

namespace Crosspay;

use Crosspay\Adapter\AbstractAdapter;

class CrossPay
{
    use ConfigTrait;

    /** @var AbstractAdapter */
    private $adapter;

    public function __construct(AbstractAdapter $adapter, $config)
    {
        $this->adapter = $adapter;
        $this->setConfig($config);
    }

    public function getAdapter()
    {
        return $this->adapter;
    }
}
