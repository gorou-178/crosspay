<?php

namespace Crosspay\Adapter;

use Crosspay\response\Collection;
use Crosspay\response\Subscription;

class NullSubscription extends AbstractSubscription
{

    public function create($params = null, $options = null) : Subscription
    {
        return null;
    }

    public function save(Subscription $target, $params = null, $options = null) : Subscription
    {
        return null;
    }

    public function retrieve($id, $params = null, $options = null) : Subscription
    {
        return null;
    }

    public function cancel(Subscription $target, $params = null, $options = null) : Subscription
    {
        return null;
    }

    public function all($params = null, $options = null) : Collection
    {
        return null;
    }
}
