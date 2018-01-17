<?php

namespace Omnipay\DnbLink;

use Omnipay\Common\AbstractGateway;
use Omnipay\DnbLink\Messages\PurchaseRequest;
use Omnipay\DnbLink\Messages\CompleteRequest;

/**
 * Class Gateway
 *
 * @package Omnipay\DnbLink
 */
class Gateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'DnB Link';
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return array(
            'gatewayUrl'            => 'https://ib.dnb.lv/login/index.php',
            'merchantId'            => '', //VK_SND_ID
            'merchantBankAccount'   => '', //VK_ACC
            'merchantName'          => '', //VK_NAME
            'merchantRegNo'         => '', //VK_REG_ID
            'merchantSwift'         => '', //VK_SWIFT
            'returnUrl'             => '',
            'certificatePath'       => '',
            'certificatePassword'   => '',

            //Global parameters for requests will be set via gateway
            'language'              => 'LAT',
            'encoding'              => 'UTF-8'
        );
    }


    /**
     * @param array $options
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function purchase(array $options = [])
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    /**
     * Complete transaction
     * @param array $options
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function completePurchase(array $options = [])
    {
        return $this->createRequest(CompleteRequest::class, $options);
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setGatewayUrl($value)
    {
        $this->setParameter('gatewayUrl', $value);
    }

    /**
     * @return string
     */
    public function getGatewayUrl()
    {
        return $this->getParameter('gatewayUrl');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setMerchantId($value)
    {
        $this->setParameter('merchantId', $value);
    }

    /**
     * @return string
     */
    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setMerchantBankAccount($value)
    {
        $this->setParameter('merchantBankAccount', $value);
    }

    /**
     * @return string
     */
    public function getMerchantBankAccount()
    {
        return $this->getParameter('merchantBankAccount');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setMerchantName($value)
    {
        $this->setParameter('merchantName', $value);
    }

    /**
     * @return string
     */
    public function getMerchantName()
    {
        return $this->getParameter('merchantName');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setMerchantRegNo($value)
    {
        $this->setParameter('merchantRegNo', $value);
    }

    /**
     * @return string
     */
    public function getMerchantRegNo()
    {
        return $this->getParameter('merchantRegNo');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setMerchantSwift($value)
    {
        $this->setParameter('merchantSwift', $value);
    }

    /**
     * @return string
     */
    public function getMerchantSwift()
    {
        return $this->getParameter('merchantSwift');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setReturnUrl($value)
    {
        $this->setParameter('returnUrl', $value);
    }

    /**
     * @return string
     */
    public function getReturnUrl()
    {
        return $this->getParameter('returnUrl');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCertificatePath($value)
    {
        $this->setParameter('certificatePath', $value);
    }

    /**
     * @return string
     */
    public function getCertificatePath()
    {
        return $this->getParameter('certificatePath');
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    /**
     * @param $value
     */
    public function setLanguage($value)
    {
        $this->setParameter('language', $value);
    }

    /**
     * @return mixed
     */
    public function getEncoding()
    {
        return $this->getParameter('encoding');
    }

    /**
     * @param $value
     */
    public function setEncoding($value)
    {
        $this->setParameter('encoding', $value);
    }


}