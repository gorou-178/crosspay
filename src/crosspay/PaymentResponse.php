<?php

namespace crosspay;

class PaymentResponse implements PaymentResponseInterface
{
    protected $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function getRawResponse()
    {
        return $this->response;
    }
}
