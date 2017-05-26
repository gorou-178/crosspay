<?php

namespace Crosspay\Adapter;

use Crosspay\crosspay\response\Subscription;

class NullSubscription extends AbstractSubscription
{

    public function create($params = null, $options = null) : Subscription
    {
        return null;
    }

    public function save($id, $params = null, $options = null) : Subscription
    {
        return null;
    }

    public function retrieve($id, $params = null, $options = null) : Subscription
    {
        return null;
    }

    public function cancel($params = null, $options = null) : Subscription
    {
        return null;
    }

    public function all($params = null, $options = null) : array
    {
        return null;
    }
}
