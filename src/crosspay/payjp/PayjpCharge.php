<?php

namespace Crosspay\Payjp;

use Crosspay\Adapter\AbstractCharge;
use Crosspay\exception\CrosspayException;
use Crosspay\response\Charge;
use Crosspay\response\Refund;
use Exception;

class PayjpCharge extends AbstractCharge
{

    public function create($params = null, $options = null): Charge
    {
        try {
            $charge = \Payjp\Charge::create($params, $options);
            return new PayjpChargeResponse($charge);
        } catch (Exception $e) {
            throw new CrosspayException('charge create exception from payjp', 0, $e);
        }
    }

    public function retrieve($id, $options = null): Charge
    {
        try {
            $charge = \Payjp\Charge::retrieve($id, $options);
            return new PayjpChargeResponse($charge);
        } catch (Exception $e) {
            throw new CrosspayException('charge retrieve exception from payjp', 0, $e);
        }
    }

    public function save(Charge $target, $params = null, $options = null): Charge
    {
        if (empty($target)) {
            throw new CrosspayException('charge is null');
        }

        try {
            $charge = \Payjp\Charge::retrieve($target->id());
            foreach ($params as $property => $value) {
                if (property_exists($charge, $property)) {
                    $charge->$property = $value;
                } else {
                    throw new CrosspayException('charge ' . $property . ' not exists');
                }
            }
            $newCharge = $charge->save($options);
            return new PayjpChargeResponse($newCharge);
        } catch (Exception $e) {
            throw new CrosspayException('charge save exception from payjp', 0, $e);
        }
    }

    public function capture(Charge $target, $params = null, $options = null): Charge
    {
        if (empty($target)) {
            throw new CrosspayException('charge is null');
        }

        try {
            $charge = \Payjp\Charge::retrieve($target->id());
            $newCharge = $charge->capture($params, $options);
            return new PayjpChargeResponse($newCharge);
        } catch (Exception $e) {
            throw new CrosspayException('charge capture exception from payjp', 0, $e);
        }
    }

    public function all($params = null, $options = null): array
    {
        try {
            $charges = \Payjp\Charge::all($params, $options);
        } catch (Exception $e) {
            throw new CrosspayException('charge all exception from payjp', 0, $e);
        }

        $results = [];
        foreach ($charges as $charge) {
            $results[] = new PayjpChargeResponse($charge);
        }
        return $results;
    }

    public function refund(Charge $target, $params = null, $options = null): Refund
    {
        if (empty($target)) {
            throw new CrosspayException('charge is null');
        }

        try {
            $charge = \Payjp\Charge::retrieve($target->id());
            $newCharge = $charge->refund($params, $options);
            return new PayjpRefundResponse($newCharge);
        } catch (Exception $e) {
            throw new CrosspayException('charge refund exception from payjp', 0, $e);
        }
    }
}
