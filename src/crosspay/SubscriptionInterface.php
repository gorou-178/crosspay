<?php

namespace crosspay;

interface SubscriptionInterface
{
    public function create();

    public function update();

    public function retrieve();

    public function cancel();

    public function all();
}
