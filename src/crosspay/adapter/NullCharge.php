<?php

namespace Crosspay\Adapter;

use Crosspay\response\Charge;
use Crosspay\response\Collection;
use Crosspay\response\Refund;

class NullCharge extends AbstractCharge
{

    public function create($params = null, $options = null): Charge
    {
        return null;
    }

    public function retrieve($id, $options = null): Charge
    {
        return null;
    }

    public function save(Charge $target, $params = null, $options = null): Charge
    {
        return null;
    }

    public function capture(Charge $target, $params = null, $options = null): Charge
    {
        return null;
    }

    public function all($params = null, $options = null): Collection
    {
        return null;
    }

    public function refund(Charge $target, $params = null, $options = null): Refund
    {
        return null;
    }
}
