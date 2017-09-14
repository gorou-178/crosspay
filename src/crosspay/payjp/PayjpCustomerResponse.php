<?php

namespace Crosspay\Payjp;

use Crosspay\Adapter\NullCard;
use Crosspay\exception\CrosspayException;
use Crosspay\response\Card;
use Crosspay\response\Customer;
use PHPUnit\Runner\Exception;

class PayjpCustomerResponse extends Customer
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
        $results = [];
        try {
            $cardList = $this->response->cards->all();
            foreach ($cardList->data as $card) {
                $results[] = new PayjpCardResponse($card);
            }
        } catch (Exception $e) {
            throw new CrosspayException('customer cards all exception for payjp', 0, $e);
        }
        return $results;
    }

    public function defaultCard() : Card
    {
        try {
            $card = $this->response->cards->retrieve($this->response->default_card);
            return new PayjpCardResponse($card);
        } catch (Exception $e) {
            throw new CrosspayException('customer cards retrieve exception for payjp', 0, $e);
        }
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
