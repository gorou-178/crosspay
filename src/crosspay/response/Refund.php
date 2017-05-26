<?php


namespace Crosspay\crosspay\response;


interface Refund
{
    public function currency() : string;
    public function amount() : int;
    public function charge() : Charge;
    public function reason() : string;
    public function created() : int;
}
