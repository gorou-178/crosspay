<?php

namespace Crosspay\response;

abstract class Collection extends ResponseBase
{
    abstract protected function convertData() : array;
    abstract public function count() : int;
    abstract public function url() : string;
    abstract public function hasMore() : bool;
    abstract public function data() : array;
}