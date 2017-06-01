<?php

namespace Crosspay;

class Config
{
    protected $settings = [];

    public static function emptyConfig()
    {
        return new Config();
    }
    
    public function __construct(array $settings = [])
    {
        $this->settings = $settings;
    }

    public function get($key, $default = null)
    {
        if (!array_key_exists($key, $this->settings)) {
            return $default;
        }

        return $this->settings[$key];
    }

    public function has($key)
    {
        if (array_key_exists($key, $this->settings)) {
            return true;
        }

        return false;
    }

    public function set($key, $value)
    {
        $this->settings[$key] = $value;

        return $this;
    }
}
