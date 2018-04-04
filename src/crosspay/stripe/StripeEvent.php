<?php

namespace Crosspay\Stripe;

use Crosspay\Adapter\AbstractEvent;
use Crosspay\exception\CrosspayException;
use Crosspay\response\Collection;
use Crosspay\response\Event;
use Exception;

class StripeEvent extends AbstractEvent
{

    public function retrieve($id, $options = null) : Event
    {
        try {
            $event = \Stripe\Event::retrieve($id, $options);
            return new StripeEventResponse($event);
        } catch (Exception $e) {
            throw new CrosspayException('event retrieve exception from stripe', 0, $e);
        }
    }

    public function all($params = null, $options = null) : Collection
    {
        try {
            $events = \Stripe\Event::all($params, $options);
            return new StripeCollectionResponse($events);
        } catch (Exception $e) {
            throw new CrosspayException('event all exception from stripe', 0, $e);
        }
    }
}
