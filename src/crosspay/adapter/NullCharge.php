<?php

namespace crosspay\adapter;

class NullCharge extends AbstractCharge
{

    public function create()
    {
        return null;
    }

    public function retrieve()
    {
        return null;
    }

    public function update()
    {
        return null;
    }

    public function capture()
    {
        return null;
    }

    public function all()
    {
        return null;
    }

    public function refund()
    {
        return null;
    }
}
