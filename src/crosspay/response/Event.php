<?php

namespace Crosspay\crosspay\response;

abstract class Event extends ResponseBase
{
    abstract public function id() : string;
    abstract public function type() : string;
    abstract public function data() : string;
    abstract public function created() : int;
}
