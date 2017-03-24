<?php

namespace Crosspay;

interface PaymentInterface
{
    /**
     * @return CustomerInterface
     */
    public function customer();

    /**
     * @return ChargeInterface
     */
    public function charge();

    /**
     * @return SubscriptionInterface
     */
    public function subscription();
}
