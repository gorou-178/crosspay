<?php

namespace crosspay;

interface ChargeInterface
{
    public function create($params = null, $options = null);

    public function retrieve($id, $options = null);

    public function update($id, $params = null, $options = null);

    public function capture($params = null, $options = null);

    public function all($params = null, $options = null);

    public function refund($params = null, $options = null);
}
