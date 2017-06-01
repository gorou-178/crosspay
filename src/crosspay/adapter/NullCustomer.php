<?php

namespace Crosspay\Adapter;

use Crosspay\response\Customer;

class NullCustomer extends AbstractCustomer
{

    public function create($params = null, $options = null) : Customer
    {
        return null;
    }

    public function save($id, $params = null, $options = null) : Customer
    {
        return null;
    }

    public function delete($params = null, $options = null) : bool
    {
        return false;
    }

    public function retrieve($id, $options = null) : Customer
    {
        return null;
    }

    public function all($params = null, $options = null) : array
    {
        return null;
    }
}
