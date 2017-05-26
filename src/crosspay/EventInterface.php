<?php

namespace Crosspay;

use Crosspay\crosspay\response\Event;

interface EventInterface
{
    public function retrieve($id, $params = null, $options = null) : Event;
    public function all($params = null, $options = null) : array;
}
