<?php

namespace Crosspay;

interface BuilderInterface
{
    public function createPayment($config);
}
