<?php

namespace Crosspay\response;

class ResponseBase implements ResponseInterface
{
    protected $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * @return mixed
     */
    public function rawResponse()
    {
        return $this->response;
    }
}
