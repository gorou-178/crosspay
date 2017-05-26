<?php

namespace Crosspay\crosspay\response;

interface Customer
{
    public function id() : string;
    public function email() : string;
    public function description() : string;
    public function card() : Card;
    public function created() : int;
}
