<?php

namespace Crosspay\response;

abstract class Refund extends ResponseBase
{
    abstract public function currency() : string;
    abstract public function amount() : int;
    abstract public function charge() : Charge;
    abstract public function reason() : string;
    abstract public function created() : int;
    abstract public function toArray() : array;
    abstract public function toJson() : string;
}
