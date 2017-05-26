<?php


namespace Crosspay\crosspay\response;

interface Event
{
    public function id() : string;
    public function type() : string;
    public function data() : string;
    public function created() : int;
}
