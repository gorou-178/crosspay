<?php

namespace Crosspay\response;

abstract class Card extends ResponseBase
{
    abstract public function id() : string;
    abstract public function brand() : string;
    abstract public function name() : string;
    abstract public function last4() : string;
    abstract public function exp_year() : string;
    abstract public function exp_month() : string;
    abstract public function fingerprint() : string;
    abstract public function customerId() : string;
    abstract public function created() : int;
    abstract public function toArray() : array;
    abstract public function toJson() : string;
}
