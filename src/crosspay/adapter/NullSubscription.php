<?php

namespace crosspay\adapter;

class NullSubscription extends AbstractSubscription
{

    public function create()
    {
        return null;
    }

    public function update()
    {
        return null;
    }

    public function retrieve()
    {
        return null;
    }

    public function cancel()
    {
        return null;
    }

    public function all()
    {
        return null;
    }
}
