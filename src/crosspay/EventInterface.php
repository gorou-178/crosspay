<?php

namespace Crosspay;

use Crosspay\response\Event;

interface EventInterface
{
    public function retrieve($id, $options = null) : Event;
    public function all($params = null, $options = null) : array;
}
