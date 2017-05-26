<?php

namespace Crosspay;

use Crosspay\crosspay\response\Subscription;

interface SubscriptionInterface
{
    public function create($params = null, $options = null) : Subscription;

    public function save($id, $params = null, $options = null) : Subscription;

    public function retrieve($id, $params = null, $options = null) : Subscription;

    public function cancel($params = null, $options = null) : Subscription;

    public function all($params = null, $options = null) : array;
}
