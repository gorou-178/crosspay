<?php

namespace Crosspay;

use Crosspay\Adapter\AbstractCharge;
use WebPay\WebPay;

class WebPayCharge extends AbstractCharge
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
        $result = $this->webPay->charge->create($params);
        return new PaymentResponse($result);
    }

    public function retrieve($id, $options = null)
    {
        // TODO: Implement retrieve() method.
    }

    public function update($id, $params = null, $options = null)
    {
        // TODO: Implement update() method.
    }

    public function capture($params = null, $options = null)
    {
        // TODO: Implement capture() method.
    }

    public function all($params = null, $options = null)
    {
        // TODO: Implement all() method.
    }

    public function refund($params = null, $options = null)
    {
        // TODO: Implement refund() method.
    }
}
