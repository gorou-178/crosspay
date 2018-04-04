<?php

namespace Crosspay\Stripe;

use Crosspay\Adapter\AbstractCustomer;
use Crosspay\exception\CrosspayException;
use Crosspay\response\Collection;
use Crosspay\response\Customer;
use Exception;

class StripeCustomer extends AbstractCustomer
{

    public function create($params = null, $options = null) : Customer
    {
        try {
            $customer = \Stripe\Customer::create($params, $options);
            return new StripeCustomerResponse($customer);
        } catch (Exception $e) {
            throw new CrosspayException('customer create exception from stripe', 0, $e);
        }
    }

    public function save(Customer $target, $params = null, $options = null) : Customer
    {
        if (empty($target)) {
            throw new CrosspayException('customer is null');
        }

        try {
            $customer = \Stripe\Customer::retrieve($target->id());
            foreach ($params as $property => $value) {
                if (property_exists($customer, $property)) {
                    $customer->$property = $value;
                } else {
                    throw new CrosspayException('customer ' . $property . ' not exists');
                }
            }
            $newCustomer = $customer->save($options);
            return new StripeCustomerResponse($newCustomer);
        } catch (Exception $e) {
            throw new CrosspayException('customer save exception from stripe', 0, $e);
        }
    }

    public function delete(Customer $target = null, $params = null, $options = null) : Customer
    {
        if (empty($target)) {
            throw new CrosspayException('customer is null');
        }

        try {
            $customer = \Stripe\Customer::retrieve($target->id());
            $deleteCustomer = $customer->delete($params, $options);
            return new StripeCustomerResponse($deleteCustomer);
        } catch (Exception $e) {
            throw new CrosspayException('customer delete exception from stripe', 0, $e);
        }
    }

    public function retrieve($id, $options = null) : Customer
    {
        try {
            $customer = \Stripe\Customer::retrieve($id);
            return new StripeCustomerResponse($customer);
        } catch (Exception $e) {
            throw new CrosspayException('customer retrieve exception from stripe', 0, $e);
        }
    }

    public function all($params = null, $options = null) : Collection
    {
        try {
            $customers = \Stripe\Customer::all($params, $options);
            return new StripeCollectionResponse($customers);
        } catch (Exception $e) {
            throw new CrosspayException('customer all exception from stripe', 0, $e);
        }
    }
}
