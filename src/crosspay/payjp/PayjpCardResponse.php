<?php

namespace Crosspay\Payjp;

use Crosspay\response\Card;

class PayjpCardResponse extends Card
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
        return '';
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
