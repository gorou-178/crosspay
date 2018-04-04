<?php

namespace Crosspay\Stripe;

use Crosspay\Adapter\AbstractCharge;
use Crosspay\exception\CrosspayException;
use Crosspay\response\Charge;
use Crosspay\response\Collection;
use Crosspay\response\Refund;
use Exception;

class StripeCharge extends AbstractCharge
{

    public function create($params = null, $options = null) : Charge
    {
        try {
            $charge = \Stripe\Charge::create($params, $options);
            return new StripeChargeResponse($charge);
        } catch (Exception $e) {
            throw new CrosspayException('charge create exception from stripe', 0, $e);
        }
    }

    public function retrieve($id, $options = null) : Charge
    {
        try {
            $charge = \Stripe\Charge::retrieve($id, $options);
            return new StripeChargeResponse($charge);
        } catch (Exception $e) {
            throw new CrosspayException('charge retrieve exception from stripe', 0, $e);
        }
    }

    public function save(Charge $target, $params = null, $options = null) : Charge
    {
        if (empty($target)) {
            throw new CrosspayException('charge is null');
        }

        try {
            $charge = \Stripe\Charge::retrieve($target->id());
            foreach ($params as $property => $value) {
                if (property_exists($charge, $property)) {
                    $charge->$property = $value;
                } else {
                    throw new CrosspayException('charge ' . $property . ' not exists');
                }
            }
            $newCharge = $charge->save($options);
            return new StripeChargeResponse($newCharge);
        } catch (Exception $e) {
            throw new CrosspayException('charge save exception from stripe', 0, $e);
        }
    }

    public function capture(Charge $target, $params = null, $options = null) : Charge
    {
        if (empty($target)) {
            throw new CrosspayException('charge is null');
        }

        try {
            $charge = \Stripe\Charge::retrieve($target->id());
            $newCharge = $charge->capture($params, $options);
            return new StripeChargeResponse($newCharge);
        } catch (Exception $e) {
            throw new CrosspayException('charge capture exception from stripe', 0, $e);
        }
    }

    public function all($params = null, $options = null) : Collection
    {
        try {
            $charges = \Stripe\Charge::all($params, $options);
            return new StripeCollectionResponse($charges);
        } catch (Exception $e) {
            throw new CrosspayException('charge all exception from stripe', 0, $e);
        }
    }

    public function refund(Charge $target, $params = null, $options = null) : Refund
    {
        if (empty($target)) {
            throw new CrosspayException('charge is null');
        }

        try {
            $charge = \Stripe\Charge::retrieve($target->id());
            $newCharge = $charge->refund($params, $options);
            return new StripeRefundResponse($newCharge);
        } catch (Exception $e) {
            throw new CrosspayException('charge refund exception from stripe', 0, $e);
        }
    }
}
