<?php

namespace Omnipay\DnbLink\Messages;

use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\DnbLink\Utils\Pizza;
use Symfony\Component\HttpFoundation\ParameterBag;

class CompleteRequest extends AbstractRequest
{

    public function getData()
    {
        /** @var ParameterBag $queryObj */
        $queryObj = $this->httpRequest->query;
        return $queryObj->all();
    }

    /**
     * @param mixed $data
     * @return \Omnipay\Common\Message\ResponseInterface|CompleteResponse
     */
    public function sendData($data)
    {
        return $purchaseResponseObj = new CompleteResponse($this, $data);
    }
}