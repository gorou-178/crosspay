<?php

namespace Crosspay\Payjp;

use Crosspay\exception\CrosspayException;
use Crosspay\response\Charge;
use Crosspay\response\Refund;
use Exception;

class PayjpRefundResponse extends Refund
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
            $charge = \Payjp\Charge::retrieve($this->response->id);
            return new PayjpChargeResponse($charge);
        } catch (Exception $e) {
            throw new CrosspayException('refund charge exception from payjp', 0, $e);
        }
    }

    public function reason() : string
    {
        return $this->response->refund_reason;
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
