<?php

namespace Crosspay\crosspay\response;

abstract class Plan extends ResponseBase
{
    abstract public function id() : string;
    abstract public function name() : string;
    abstract public function amount() : int;
    abstract public function currency() : string;
    abstract public function interval() : string;
    abstract public function created() : int;
}
