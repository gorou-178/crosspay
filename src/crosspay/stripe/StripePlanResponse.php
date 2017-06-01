<?php

namespace Crosspay\Stripe;

use Crosspay\response\Plan;

class StripePlanResponse extends Plan
{

    public function id() : string
    {
        return $this->response->id;
    }

    public function name() : string
    {
        return $this->response->name;
    }

    public function amount() : int
    {
        return $this->response->amount;
    }

    public function currency() : string
    {
        return $this->response->currency;
    }

    public function interval() : string
    {
        return $this->response->interval;
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
