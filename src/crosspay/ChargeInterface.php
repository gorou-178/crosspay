<?php

namespace Crosspay;

use Crosspay\response\Charge;
use Crosspay\response\Collection;
use Crosspay\response\Refund;

interface ChargeInterface
{
    public function create($params = null, $options = null) : Charge;

    public function retrieve($id, $options = null) : Charge;

    public function save(Charge $target, $params = null, $options = null) : Charge;

    public function capture(Charge $target, $params = null, $options = null) : Charge;

    public function all($params = null, $options = null) : Collection;

    public function refund(Charge $target, $params = null, $options = null) : Refund;
}
