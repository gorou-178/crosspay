<?php

namespace Crosspay;

class ApiBase
{
    protected $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }
    
    public function config() : Config
    {
        return $this->config;
    }
}
