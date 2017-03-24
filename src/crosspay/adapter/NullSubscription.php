<?php

namespace Crosspay\Adapter;

class NullSubscription extends AbstractSubscription
{

    public function create($params = null, $options = null)
    {
        return null;
    }

    public function update($id, $params = null, $options = null)
    {
        return null;
    }

    public function retrieve($id, $params = null, $options = null)
    {
        return null;
    }

    public function cancel($params = null, $options = null)
    {
        return null;
    }

    public function all($params = null, $options = null)
    {
        return null;
    }
}
