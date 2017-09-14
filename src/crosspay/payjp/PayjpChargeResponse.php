<?php

namespace Crosspay\Payjp;

use Crosspay\response\Card;
use Crosspay\response\Charge;

class PayjpChargeResponse extends Charge
{
    public function id() : string
    {
        return $this->response->id;
    }

    public function currency() : string
    {
        return $this->response->currency;
    }

    public function description() : string
    {
        return $this->response->description;
    }

    public function amount() : int
    {
        return $this->response->amount;
    }

    public function captured() : bool
    {
        return $this->response->captured;
    }

    public function refunded() : bool
    {
        return $this->response->refunded;
    }

    public function amount_refunded() : int
    {
        return $this->response->amount_refunded;
    }

    public function failure_code() : string
    {
        return $this->response->failure_code;
    }

    public function failure_message() : string
    {
        return $this->response->failure_message;
    }

    public function card() : Card
    {
        $card = new PayjpCardResponse($this->response->card);
        return $card;
    }

    public function customerId() : string
    {
        return $this->response->customer;
    }

    public function subscriptionId() : string
    {
        return $this->response->subscription;
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
