<?php

namespace Crosspay\Stripe;

use Crosspay\Adapter\AbstractSubscription;
use Crosspay\crosspay\response\Subscription;

class StripeSubscription extends AbstractSubscription
{

    public function create($params = null, $options = null) : Subscription
    {
        // TODO: Implement create() method.
    }

    public function save($id, $params = null, $options = null) : Subscription
    {
        // TODO: Implement save() method.
    }

    public function retrieve($id, $params = null, $options = null) : Subscription
    {
        // TODO: Implement retrieve() method.
    }

    public function cancel($params = null, $options = null) : Subscription
    {
        // TODO: Implement cancel() method.
    }

    public function all($params = null, $options = null) : array
    {
        // TODO: Implement all() method.
    }
}
