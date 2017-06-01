<?php

namespace Crosspay;

use Crosspay\response\Customer;

interface CustomerInterface
{
    public function create($params = null, $options = null) : Customer;

    public function save(Customer $target, $params = null, $options = null) : Customer;

    public function delete(Customer $target, $params = null, $options = null) : Customer;

    public function retrieve($id, $options = null) : Customer;

    public function all($params = null, $options = null) : array;
}
