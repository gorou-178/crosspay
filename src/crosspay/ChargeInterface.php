<?php

namespace crosspay;

interface ChargeInterface
{
    public function create();

    public function retrieve();

    public function update();

    public function capture();

    public function all();

    public function refund();
}
