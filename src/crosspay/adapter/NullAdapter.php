<?php

namespace Crosspay;

use Crosspay\Adapter\AbstractAdapter;
use Crosspay\Adapter\NullCharge;
use Crosspay\Adapter\NullCustomer;
use Crosspay\Adapter\NullSubscription;

class NullAdapter extends AbstractAdapter
{
    /**
     * @return CustomerInterface
     */
    public function customer()
    {
        return new NullCustomer();
    }

    /**
     * @return ChargeInterface
     */
    public function charge()
    {
        return new NullCharge();
    }

    /**
     * @return SubscriptionInterface
     */
    public function subscription()
    {
        return new NullSubscription();
    }
}
