<?php

namespace Crosspay;

/**
 * Class CrossPay
 * @package Crosspay
 * @method \Crosspay\CustomerInterface customer()
 * @method \Crosspay\ChargeInterface charge()
 * @method \Crosspay\SubscriptionInterface subscription()
 * @method \Crosspay\EventInterface event()
 */
class CrossPay
{
    use ConfigTrait;

    /** @var AdapterInterface */
    protected $adapter;

    /**
     * CrossPay constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->setConfig($config);
        $this->buildAdapter();
    }

    /**
     * @return AdapterInterface
     */
    protected function buildAdapter()
    {
        if (empty($this->getConfig()->get('provider'))) {
            throw new \InvalidArgumentException('provider not found');
        }
        $adapterClass = ucfirst($this->getConfig()->get('provider')) . 'Adapter';
        $this->adapter = new $adapterClass($this->getConfig());
        return $this->adapter;
    }

    /**
     * @return AdapterInterface
     */
    public function adapter()
    {
        return $this->adapter;
    }

    /**
     * @param $method
     * @param $arguments
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return $this->adapter()->$method(...$arguments);
    }

}
