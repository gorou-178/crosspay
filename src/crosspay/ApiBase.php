<?php

namespace crosspay;

class ApiBase
{
    use ConfigTrait;

    protected $provider;


    public function __construct($provider, $config)
    {
        $this->provider = $provider;
        $this->setConfig($config);
    }

    public function getProvider()
    {
        return $this->provider;
    }
}
