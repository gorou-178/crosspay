<?php

namespace Crosspay\Adapter;

use Crosspay\response\Event;

class NullEvent extends AbstractEvent
{
    public function retrieve($id, $params = null, $options = null) : Event
    {
        return null;
    }

    public function all($params = null, $options = null) : array
    {
        return null;
    }
}
