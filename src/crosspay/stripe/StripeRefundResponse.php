<?php

namespace Crosspay\Stripe;

use Crosspay\exception\CrosspayException;
use Crosspay\response\Charge;
use Crosspay\response\Refund;
use Exception;

class StripeRefundResponse extends Refund
{

    public function currency() : string
    {
        return $this->response->currency;
    }

    public function amount() : int
    {
        return $this->response->amount;
    }

    public function charge() : Charge
    {
        try {
            $charge = \Stripe\Charge::retrieve($this->response->charge);
            return new StripeChargeResponse($charge);
        } catch (Exception $e) {
            throw new CrosspayException('refund all exception from stripe', 0, $e);
        }
    }

    public function reason() : string
    {
        return $this->response->reason;
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
