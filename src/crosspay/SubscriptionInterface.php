<?php

namespace Crosspay;

use Crosspay\response\Subscription;

interface SubscriptionInterface
{
    public function create($params = null, $options = null) : Subscription;

    public function save(Subscription $target, $params = null, $options = null) : Subscription;

    public function retrieve($id, $params = null, $options = null) : Subscription;

    public function cancel(Subscription $target, $params = null, $options = null) : Subscription;

    public function all($params = null, $options = null) : array;
}
