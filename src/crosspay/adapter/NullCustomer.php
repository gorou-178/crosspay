<?php

namespace crosspay\adapter;

class NullCustomer extends AbstractCustomer
{

    public function create()
    {
        return null;
    }

    public function update()
    {
        return null;
    }

    public function delete()
    {
        return null;
    }

    public function retrieve()
    {
        return null;
    }

    public function all()
    {
        return null;
    }
}
