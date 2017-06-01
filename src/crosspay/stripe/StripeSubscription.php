<?php

namespace Crosspay\Stripe;

use Crosspay\Adapter\AbstractSubscription;
use Crosspay\exception\CrosspayException;
use Crosspay\response\Subscription;
use Exception;

class StripeSubscription extends AbstractSubscription
{

    public function create($params = null, $options = null) : Subscription
    {
        try {
            $subscription = \Stripe\Subscription::create($params, $options);
            return new StripeSubscriptionResponse($subscription);
        } catch (Exception $e) {
            throw new CrosspayException('subscription create exception from stripe', 0, $e);
        }
    }

    public function save(Subscription $target, $params = null, $options = null) : Subscription
    {
        if (empty($target)) {
            throw new CrosspayException('subscription is null');
        }

        try {
            $subscription = \Stripe\Subscription::retrieve($target->id());
            foreach ($params as $property => $value) {
                if (property_exists($subscription, $property)) {
                    $subscription->$property = $value;
                } else {
                    throw new CrosspayException('subscription ' . $property . ' not exists');
                }
            }
            $newSubscription = $subscription->save($options);
            return new StripeSubscriptionResponse($newSubscription);
        } catch (Exception $e) {
            throw new CrosspayException('subscription save exception from stripe', 0, $e);
        }
    }

    public function retrieve($id, $params = null, $options = null) : Subscription
    {
        try {
            $subscription = \Stripe\Subscription::retrieve($id, $options);
            return new StripeSubscriptionResponse($subscription);
        } catch (Exception $e) {
            throw new CrosspayException('subscription retrieve exception from stripe', 0, $e);
        }
    }

    public function cancel(Subscription $target, $params = null, $options = null) : Subscription
    {
        if (empty($target)) {
            throw new CrosspayException('subscription is null');
        }

        try {
            $subscription = \Stripe\Subscription::retrieve($target->id());
            $canceledSubscription = $subscription->cancel($params, $options);
            return new StripeSubscriptionResponse($canceledSubscription);
        } catch (Exception $e) {
            throw new CrosspayException('subscription cancel exception from stripe', 0, $e);
        }
    }

    public function all($params = null, $options = null) : array
    {
        try {
            $subscription = \Stripe\Subscription::all($params, $options);
            return new StripeSubscriptionResponse($subscription);
        } catch (Exception $e) {
            throw new CrosspayException('subscription all exception from stripe', 0, $e);
        }
    }
}
