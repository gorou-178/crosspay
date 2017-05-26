<?php

namespace Crosspay;

/**
 * Class ConfigTrait
 * @package Crosspay
 */
trait ConfigTrait
{
    /** @var Config */
    protected $config;

    /**
     * @param $config
     * @return Config
     */
    protected function setConfig($config)
    {
        if ($config === null) {
            $this->config = new Config();
        } elseif ($config instanceof Config) {
            $this->config = $config;
        } elseif (is_array($config)) {
            $this->config = new Config($config);
        }
        return $this->config;
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }
}
