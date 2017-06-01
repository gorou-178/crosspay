<?php

namespace Crosspay\response;

abstract class Customer extends ResponseBase
{
    abstract public function id() : string;
    abstract public function email() : string;
    abstract public function description() : string;
    abstract public function card() : Card;
    abstract public function created() : int;
    abstract public function toArray() : array;
    abstract public function toJson() : string;
}
