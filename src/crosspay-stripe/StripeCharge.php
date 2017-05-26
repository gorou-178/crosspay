<?php

namespace Crosspay\Stripe;

use Crosspay\Adapter\AbstractCharge;
use Crosspay\crosspay\response\Charge;
use Crosspay\crosspay\response\Refund;

class StripeCharge extends AbstractCharge
{

    public function create($params = null, $options = null) : Charge
    {
        // TODO: Implement create() method.
    }

    public function retrieve($id, $options = null) : Charge
    {
        // TODO: Implement retrieve() method.
    }

    public function save($id, $params = null, $options = null) : Charge
    {
        // TODO: Implement save() method.
    }

    public function capture($params = null, $options = null) : Charge
    {
        // TODO: Implement capture() method.
    }

    public function all($params = null, $options = null) : array
    {
        // TODO: Implement all() method.
    }

    public function refund($params = null, $options = null) : Refund
    {
        // TODO: Implement refund() method.
    }
}
