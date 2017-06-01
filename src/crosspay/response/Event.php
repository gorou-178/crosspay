<?php

namespace Crosspay\response;

abstract class Event extends ResponseBase
{
    abstract public function id() : string;
    abstract public function type() : string;
    abstract public function data() : string;
    abstract public function created() : int;
    abstract public function toArray() : array;
    abstract public function toJson() : string;
}
