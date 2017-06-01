<?php

namespace Crosspay\response;

abstract class Charge extends ResponseBase
{
    abstract public function id() : string;
    abstract public function currency() : string;
    abstract public function description() : string;
    abstract public function amount() : int;
    abstract public function captured() : bool;
    abstract public function refunded() : bool;
    abstract public function amount_refunded() : int;
    abstract public function failure_code() : string;
    abstract public function failure_message() : string;
    abstract public function card() : Card;
    abstract public function customerId() : string;
    abstract public function subscriptionId() : string;
    abstract public function created() : int;
    abstract public function toArray() : array;
    abstract public function toJson() : string;
}
