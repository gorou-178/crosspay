<?php

namespace crosspay;

interface BuilderInterface
{
    public function createPayment($config);
}
