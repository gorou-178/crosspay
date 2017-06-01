<?php

namespace Crosspay\response;

abstract class Subscription extends ResponseBase
{
    abstract public function id() : string;
    abstract public function description() : string;
    abstract public function start() : int;
    abstract public function customerId() : string;
    abstract public function created() : int;
    abstract public function plan() : Plan;
    abstract public function status() : string;
    abstract public function canceled_at() : int;
}
