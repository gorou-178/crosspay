<?php

namespace Crosspay\crosspay\response;

interface Plan
{
    public function id() : string;
    public function name() : string;
    public function amount() : int;
    public function currency() : string;
    public function interval() : string;
    public function created() : int;
}
