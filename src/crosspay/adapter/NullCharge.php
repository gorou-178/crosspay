<?php

namespace Crosspay\Adapter;

use Crosspay\response\Charge;
use Crosspay\response\Refund;

class NullCharge extends AbstractCharge
{

    public function create($params = null, $options = null) : Charge
    {
        return null;
    }

    public function retrieve($id, $options = null) : Charge
    {
        return null;
    }

    public function save($id, $params = null, $options = null) : Charge
    {
        return null;
    }

    public function capture($params = null, $options = null) : Charge
    {
        return null;
    }

    public function all($params = null, $options = null) : array
    {
        return null;
    }

    public function refund($params = null, $options = null) : Refund
    {
        return null;
    }
}
