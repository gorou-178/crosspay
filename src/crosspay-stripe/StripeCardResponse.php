<?php


namespace Crosspay\stripe;

use Crosspay\crosspay\response\Card;

class StripeCardResponse extends Card
{

    public function id() : string
    {
        return $this->response->id;
    }

    public function brand() : string
    {
        return $this->response->brand;
    }

    public function name() : string
    {
        return $this->response->name;
    }

    public function last4() : string
    {
        if (!empty($this->response->dynamic_last4)) {
            return $this->response->dynamic_last4;
        }
        return $this->response->last4;
    }

    public function exp_year() : string
    {
        return $this->response->exp_year;
    }

    public function exp_month() : string
    {
        return $this->response->exp_month;
    }

    public function fingerprint() : string
    {
        return $this->response->fingerprint;
    }

    public function customerId() : string
    {
        return $this->response->customerId;
    }

    public function created() : int
    {
        return $this->response->created;
    }
}
