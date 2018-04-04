<?php

namespace Crosspay\payjp;

use Crosspay\response\Collection;

class PayjpCollectionResponse extends Collection
{

    protected function convertData() : array
    {
        $url = $this->url();
        $responseClass = '';
        if (strpos($url, 'charges') !== false) {
            $responseClass = 'PayjpChargeResponse';
        }
        if (strpos($url, 'subscriptions') !== false) {
            $responseClass = 'PayjpSubscriptionResponse';
        }
        if (strpos($url, 'customers') !== false) {
            $responseClass = 'PayjpCustomerResponse';
        }
        if (strpos($url, 'events') !== false) {
            $responseClass = 'PayjpEventResponse';
        }

        $results = [];
        foreach ($this->response->data as $data) {
            $results[] = new $responseClass($data);
        }
        return $results;
    }

    public function __construct(string $response = '')
    {
        parent::__construct($response);

    }

    public function count(): int
    {
        return $this->response->count;
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