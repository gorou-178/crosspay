<?php

namespace Crosspay\Payjp;

use Crosspay\Adapter\AbstractCustomer;
use Crosspay\exception\CrosspayException;
use Crosspay\response\Collection;
use Crosspay\response\Customer;
use Exception;

class PayjpCustomer extends AbstractCustomer
{

    public function create($params = null, $options = null): Customer
    {
        try {
            $customer = \Payjp\Customer::create($params, $options);
            return new PayjpCustomerResponse($customer);
        } catch (Exception $e) {
            throw new CrosspayException('customer create exception from payjp', 0, $e);
        }
    }

    public function save(Customer $target, $params = null, $options = null): Customer
    {
        if (empty($target)) {
            throw new CrosspayException('customer is null');
        }

        try {
            $customer = \Payjp\Customer::retrieve($target->id());
            foreach ($params as $property => $value) {
                if (property_exists($customer, $property)) {
                    $customer->$property = $value;
                } else {
                    throw new CrosspayException('customer ' . $property . ' not exists');
                }
            }
            $newCharge = $customer->save($options);
            return new PayjpCustomerResponse($newCharge);
        } catch (Exception $e) {
            throw new CrosspayException('customer save exception from payjp', 0, $e);
        }
    }

    public function delete(Customer $target, $params = null, $options = null): Customer
    {
        if (empty($target)) {
            throw new CrosspayException('customer is null');
        }

        try {
            $customer = \Payjp\Customer::retrieve($target->id());
            $deleteCustomer = $customer->delete($params, $options);
            return new PayjpCustomerResponse($deleteCustomer);
        } catch (Exception $e) {
            throw new CrosspayException('customer delete exception from payjp', 0, $e);
        }
    }

    public function retrieve($id, $options = null): Customer
    {
        try {
            $customer = \Payjp\Customer::retrieve($id);
            return new PayjpCustomerResponse($customer);
        } catch (Exception $e) {
            throw new CrosspayException('customer retrieve exception from payjp', 0, $e);
        }
    }

    public function all($params = null, $options = null): Collection
    {
        try {
            $customers = \Payjp\Customer::all($params, $options);
            return new PayjpCollectionResponse($customers);
        } catch (Exception $e) {
            throw new CrosspayException('customer all exception from payjp', 0, $e);
        }
    }
}
