<?php

namespace Crosspay\Adapter;

use Crosspay\response\Collection;
use Crosspay\response\Customer;

class NullCustomer extends AbstractCustomer
{

    public function create($params = null, $options = null): Customer
    {
        return null;
    }

    public function save(Customer $target, $params = null, $options = null): Customer
    {
        return null;
    }

    public function delete(Customer $target, $params = null, $options = null): Customer
    {
        return null;
    }

    public function retrieve($id, $options = null): Customer
    {
        return null;
    }

    public function all($params = null, $options = null): Collection
    {
        return null;
    }
}
