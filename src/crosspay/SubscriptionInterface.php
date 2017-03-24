<?php

namespace Crosspay;

interface SubscriptionInterface
{
    public function create($params = null, $options = null);

    public function update($id, $params = null, $options = null);

    public function retrieve($id, $params = null, $options = null);

    public function cancel($params = null, $options = null);

    public function all($params = null, $options = null);
}
