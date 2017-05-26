<?php

namespace Crosspay\Stripe;

use Crosspay\Adapter\AbstractCustomer;
use Crosspay\crosspay\response\Customer;

class StripeCustomer extends AbstractCustomer
{

    public function create($params = null, $options = null) : Customer
    {
        // TODO: Implement create() method.
    }

    public function save($id, $params = null, $options = null) : Customer
    {
        // TODO: Implement save() method.
    }

    public function delete($params = null, $options = null) : bool
    {
        // TODO: Implement delete() method.
    }

    public function retrieve($id, $options = null) : Customer
    {
        // TODO: Implement retrieve() method.
    }

    public function all($params = null, $options = null) : array
    {
        // TODO: Implement all() method.
    }
}
