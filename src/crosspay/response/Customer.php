<?php

namespace Crosspay\crosspay\response;

abstract class Customer extends ResponseBase
{
    abstract public function id() : string;
    abstract public function email() : string;
    abstract public function description() : string;
    abstract public function card() : Card;
    abstract public function created() : int;
}
