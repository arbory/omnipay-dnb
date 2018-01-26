<?php

namespace Omnipay\DnbLink\Messages;

use Omnipay\Common\Message\AbstractResponse as CommonAbstractResponse;
use Symfony\Component\HttpFoundation\ParameterBag;

abstract class AbstractResponse extends CommonAbstractResponse
{
    /**
     * @return string
     */
    public function getMessage()
    {
        //TODO: return error message
        return null;
    }

    public function getTransactionReference()
    {
        $data = $this->getData();
        return $data['VK_REF'] ?? $data['VK_REF'];
    }
}