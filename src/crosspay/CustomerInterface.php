<?php

namespace Crosspay;

use Crosspay\crosspay\response\Customer;

interface CustomerInterface
{
    public function create($params = null, $options = null) : Customer;

    public function save($id, $params = null, $options = null) : Customer;

    public function delete($params = null, $options = null) : bool;

    public function retrieve($id, $options = null) : Customer;

    public function all($params = null, $options = null) : array;
}
