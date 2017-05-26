<?php


namespace Crosspay\crosspay\response;


interface Charge
{
    public function id() : string;
    public function currency() : string;
    public function description() : string;
    public function amount() : int;
    public function captured() : bool;
    public function refunded() : bool;
    public function amount_refunded() : int;
    public function failure_code() : string;
    public function failure_message() : string;
    public function card() : Card;
    public function customerId() : string;
    public function subscriptionId() : string;
    public function created() : int;
}
