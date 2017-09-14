<?php

namespace Crosspay\Adapter;

use Crosspay\response\Card;

class NullCard extends Card
{
    public function id(): string
    {
        return null;
    }

    public function brand(): string
    {
        return null;
    }

    public function name(): string
    {
        return null;
    }

    public function last4(): string
    {
        return null;
    }

    public function exp_year(): string
    {
        return null;
    }

    public function exp_month(): string
    {
        return null;
    }

    public function fingerprint(): string
    {
        return null;
    }

    public function customerId(): string
    {
        return null;
    }

    public function created(): int
    {
        return null;
    }

    public function toArray(): array
    {
        return null;
    }

    public function toJson(): string
    {
        return null;
    }
}
