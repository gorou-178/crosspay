<?php

namespace Crosspay\Adapter;

class NullCustomer extends AbstractCustomer
{

    public function create($params = null, $options = null)
    {
        return null;
    }

    public function update($id, $params = null, $options = null)
    {
        return null;
    }

    public function delete($params = null, $options = null)
    {
        return null;
    }

    public function retrieve($id, $options = null)
    {
        return null;
    }

    public function all($params = null, $options = null)
    {
        return null;
    }
}
