<?php


namespace Crosspay\stripe;

use Crosspay\response\Collection;

class StripeCollectionResponse extends Collection
{
    protected function convertData() : array
    {
        $url = $this->url();
        $responseClass = '';
        if (strpos($url, 'charges') !== false) {
            $responseClass = 'StripeChargeResponse';
        }
        if (strpos($url, 'subscriptions') !== false) {
            $responseClass = 'StripeSubscriptionResponse';
        }
        if (strpos($url, 'customers') !== false) {
            $responseClass = 'StripeCustomerResponse';
        }
        if (strpos($url, 'events') !== false) {
            $responseClass = 'StripeEventResponse';
        }

        $results = [];
        foreach ($this->response->data as $data) {
            $results[] = new $responseClass($data);
        }
        return $results;
    }

    public function count(): int
    {
        return count($this->data());
    }

    public function url(): string
    {
        return $this->response->url;
    }

    public function hasMore(): bool
    {
        return $this->response->has_more;
    }

    public function data(): array
    {
        return $this->convertData();
    }
}
