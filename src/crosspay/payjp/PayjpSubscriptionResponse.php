<?php

namespace Crosspay\Payjp;

use Crosspay\response\Plan;
use Crosspay\response\Subscription;

class PayjpSubscriptionResponse extends Subscription
{
    public function id() : string
    {
        return $this->response->id;
    }

    public function description() : string
    {
        return '';
    }

    public function start() : int
    {
        return $this->response->start;
    }

    public function customerId() : string
    {
        return $this->response->customer;
    }

    public function created() : int
    {
        return $this->response->created;
    }

    public function plan() : Plan
    {
        return new PayjpPlanResponse($this->response->plan);
    }

    public function status() : string
    {
        return $this->response->status;
    }

    public function canceled_at() : int
    {
        return $this->response->canceled_at;
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
