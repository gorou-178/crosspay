<?php

namespace Crosspay\Stripe;

use Crosspay\Adapter\AbstractCharge;
use Crosspay\crosspay\response\Charge;
use Crosspay\crosspay\response\Refund;
use Stripe\Stripe;

class StripeCharge extends AbstractCharge
{

    public function create($params = null, $options = null) : Charge
    {
        $response = \Stripe\Charge::create($params, $options);
        return new StripeChargeResponse($response);
    }

    public function retrieve($id, $options = null) : Charge
    {
        $response = \Stripe\Charge::retrieve($id, $options);
        return new StripeChargeResponse($response);
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
