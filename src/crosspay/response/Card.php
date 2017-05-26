<?php

namespace Crosspay\crosspay\response;

interface Card
{
    public function id() : string;
    public function brand() : string;
    public function name() : string;
    public function last4() : string;
    public function exp_year() : string;
    public function exp_month() : string;
    public function fingerprint() : string;
    public function customerId() : string;
    public function created() : int;
}
