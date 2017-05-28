<?php

namespace Crosppay\stripe;

use Crosspay\crosspay\response\Card;
use Crosspay\crosspay\response\Customer;
use Crosspay\stripe\StripeCardResponse;

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
}
