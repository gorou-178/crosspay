<?php

namespace Crosspay\Stripe;

use Crosspay\response\Card;
use Crosspay\response\Customer;

class StripeCustomerResponse extends Customer
{

    public function id() : string
    {
        return $this->response->id;
    }

    public function email() : string
    {
        return $this->response->email;
    }

    public function description() : string
    {
        return $this->response->description;
    }

    public function card() : Card
    {
        return new StripeCardResponse($this->response->card);
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
