<?php

namespace crosspay;

use crosspay\adapter\AbstractSubscription;
use WebPay\WebPay;

class WebPaySubscription extends AbstractSubscription
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

    public function retrieve($id, $params = null, $options = null)
    {
        // TODO: Implement retrieve() method.
    }

    public function cancel($params = null, $options = null)
    {
        // TODO: Implement cancel() method.
    }

    public function all($params = null, $options = null)
    {
        // TODO: Implement all() method.
    }
}
