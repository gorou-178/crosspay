<?php

namespace Crosspay\stripe;

use Crosspay\crosspay\response\Event;

class StripeEventResponse extends Event
{

    public function id() : string
    {
        return $this->response->id;
    }

    public function type() : string
    {
        return $this->response->type;
    }

    public function data() : string
    {
        return $this->response->data;
    }

    public function created() : int
    {
        return $this->response->created;
    }
}
