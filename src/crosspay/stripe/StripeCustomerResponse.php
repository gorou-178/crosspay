<?php

namespace Crosspay\Stripe;

use Crosspay\Adapter\NullCard;
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

    public function cards() : array
    {
        $cards = $this->response->sources->data;
        $result = [];
        foreach ($cards as $card) {
            $result[] = new StripeCardResponse($card);
        }
        return $result;
    }

    public function defaultCard() : Card
    {
        $hasMore = $cards = $this->response->sources->has_more;
        $cards = $this->response->sources->data;
        foreach ($cards as $card) {
            if (!$hasMore || $card->id === $this->response->default_source) {
                return new StripeCardResponse($card);
            }
        }
        return new NullCard();
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
