<?php

namespace Crosspay\crosspay\response;

abstract class Refund extends ResponseBase
{
    abstract public function currency() : string;
    abstract public function amount() : int;
    abstract public function charge() : Charge;
    abstract public function reason() : string;
    abstract public function created() : int;
}
