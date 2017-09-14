<?php

namespace Crosspay\Payjp;

use Crosspay\response\Event;

class PayjpEventResponse extends Event
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

    public function toArray() : array
    {
        return (array)$this->response;
    }

    public function toJson() : string
    {
        return json_encode($this->response);
    }
}
