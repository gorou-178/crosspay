<?php

namespace crosspay;

use crosspay\adapter\AbstractCustomer;
use WebPay\WebPay;

class WebPayCustomer extends AbstractCustomer
{
    /** @var WebPay */
    protected $webPay;

    public function __construct($webPay, $config)
    {
        $this->webPay = $webPay;
        $this->setConfig($config);
    }

    public function create()
    {

    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function retrieve()
    {
        // TODO: Implement retrieve() method.
    }

    public function all()
    {
        // TODO: Implement all() method.
    }
}
