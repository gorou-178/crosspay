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

    public function create($params = null, $options = null)
    {
        // TODO: Implement create() method.
    }

    public function update($id, $params = null, $options = null)
    {
        // TODO: Implement update() method.
    }

    public function delete($params = null, $options = null)
    {
        // TODO: Implement delete() method.
    }

    public function retrieve($id, $options = null)
    {
        // TODO: Implement retrieve() method.
    }

    public function all($params = null, $options = null)
    {
        // TODO: Implement all() method.
    }
}
