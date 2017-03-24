<?php

namespace crosspay;

interface CustomerInterface
{
    public function create();

    public function update();

    public function delete();

    public function retrieve();

    public function all();
}
