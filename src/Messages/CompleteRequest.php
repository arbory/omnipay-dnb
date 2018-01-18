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

    /*
     * Faking sending, this allows easier multi gateway flow processing
     * This is done because omnipay's flow does not have a processing flow for direct response , only request -> response -> process result
     */
    public function createResponse(array $data)
    {
        // Read data from request object
        return $purchaseResponseObj = new CompleteResponse($this, $data);
    }


}