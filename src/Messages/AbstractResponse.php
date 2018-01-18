<?php

namespace Omnipay\DnbLink\Messages;

use Omnipay\Common\Message\AbstractResponse as CommonAbstractResponse;
use Symfony\Component\HttpFoundation\ParameterBag;

abstract class AbstractResponse extends CommonAbstractResponse
{
    private $returnUrl = null;
    private $gatewayUrl = null;

    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
    }

    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    public function setGatewayUrl($value)
    {
        $this->gatewayUrl = $value;
    }

    public function getGatewayUrl()
    {
        return $this->gatewayUrl;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return null;
    }

    public function getTransactionReference()
    {
        $data = $this->getData();
        return $data['VK_REF'] ?? $data['VK_REF'];
    }

    public function getCertificatePath()
    {

        return $this->request->getParameters()['certificatePat'];
    }

    public function getEncoding()
    {

        return $this->request->getParameters()['encoding'];
    }
}