<?php

namespace Crosspay;

class ApiBase
{
    protected $config;

    public function __construct(Config $config = null)
    {
        if (is_null($config)) {
            $this->config = Config::emptyConfig();
        } else {
            $this->config = $config;
        }
    }

    public function config() : Config
    {
        return $this->config;
    }
}
