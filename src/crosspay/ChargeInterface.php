<?php

namespace Crosspay;

use Crosspay\crosspay\response\Charge;
use Crosspay\crosspay\response\Refund;

interface ChargeInterface
{
    public function create($params = null, $options = null) : Charge;

    public function retrieve($id, $options = null) : Charge;

    public function save($id, $params = null, $options = null) : Charge;

    public function capture($params = null, $options = null) : Charge;

    public function all($params = null, $options = null) : array;

    public function refund($params = null, $options = null) : Refund;
}
