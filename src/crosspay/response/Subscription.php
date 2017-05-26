<?php

namespace Crosspay\crosspay\response;

interface Subscription
{
    public function id() : string;
    public function description() : string;
    public function start() : int;
    public function customerId() : string;
    public function created() : int;
    public function plan() : Plan;
    public function status() : string;
    public function canceled_at() : int;
}
