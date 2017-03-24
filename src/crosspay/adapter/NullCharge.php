<?php

namespace Crosspay\Adapter;

class NullCharge extends AbstractCharge
{

    public function create($params = null, $options = null)
    {
        return null;
    }

    public function retrieve($id, $options = null)
    {
        return null;
    }

    public function update($id, $params = null, $options = null)
    {
        return null;
    }

    public function capture($params = null, $options = null)
    {
        return null;
    }

    public function all($params = null, $options = null)
    {
        return null;
    }

    public function refund($params = null, $options = null)
    {
        return null;
    }
}
