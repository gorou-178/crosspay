<?php

namespace Crosspay\Payjp;

use Crosspay\Adapter\AbstractSubscription;
use Crosspay\exception\CrosspayException;
use Crosspay\response\Collection;
use Crosspay\response\Subscription;
use Exception;

class PayjpSubscription extends AbstractSubscription
{

    public function create($params = null, $options = null): Subscription
    {
        try {
            $subscription = \Payjp\Subscription::create($params, $options);
            return new PayjpSubscriptionResponse($subscription);
        } catch (Exception $e) {
            throw new CrosspayException('subscription create exception from payjp', 0, $e);
        }
    }

    public function save(Subscription $target, $params = null, $options = null): Subscription
    {
        if (empty($target)) {
            throw new CrosspayException('subscription is null');
        }

        try {
            $subscription = \Payjp\Subscription::retrieve($target->id());
            foreach ($params as $property => $value) {
                if (property_exists($subscription, $property)) {
                    $subscription->$property = $value;
                } else {
                    throw new CrosspayException('subscription ' . $property . ' not exists');
                }
            }
            $newSubscription = $subscription->save($options);
            return new PayjpSubscriptionResponse($newSubscription);
        } catch (Exception $e) {
            throw new CrosspayException('subscription save exception from payjp', 0, $e);
        }
    }

    public function retrieve($id, $params = null, $options = null): Subscription
    {
        try {
            $subscription = \Payjp\Subscription::retrieve($id, $options);
            return new PayjpSubscriptionResponse($subscription);
        } catch (Exception $e) {
            throw new CrosspayException('subscription retrieve exception from payjp', 0, $e);
        }
    }

    public function cancel(Subscription $target, $params = null, $options = null): Subscription
    {
        if (empty($target)) {
            throw new CrosspayException('subscription is null');
        }

        try {
            $subscription = \Payjp\Subscription::retrieve($target->id());
            $canceledSubscription = $subscription->cancel($params, $options);
            return new PayjpSubscriptionResponse($canceledSubscription);
        } catch (Exception $e) {
            throw new CrosspayException('subscription cancel exception from payjp', 0, $e);
        }
    }

    public function all($params = null, $options = null): Collection
    {
        try {
            $subscriptions = \Payjp\Subscription::all($params, $options);
            return new PayjpCollectionResponse($subscriptions);
        } catch (Exception $e) {
            throw new CrosspayException('subscription all exception from payjp', 0, $e);
        }
    }
}
