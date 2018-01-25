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
            'gatewayUrl' => 'https://ib.dnb.lv/login/index.php',
            'gatewayTestUrl' => 'https://link.securet.dnb.lv/login/rid_login.php',

            'merchantId' => '', //VK_SND_ID
            'merchantBankAccount' => '', //VK_ACC
            'merchantName' => '', //VK_NAME
            'merchantRegNo' => '', //VK_REG_ID
            'merchantSwift' => '', //VK_SWIFT
            'returnUrl' => '',
            'returnUrlSecondary' => '',

            'privateCertificatePath' => '',
            'privateCertificatePassword' => null,
            'publicCertificatePath' => '',
            'testMode' => false,

            //Global parameters for requests will be set via gateway
            'language' => 'LAT',
            'encoding' => 'UTF-8'
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
    public function setGatewayTestUrl($value)
    {
        $this->setParameter('gatewayTestUrl', $value);
    }

    /**
     * @return string
     */
    public function getGatewayTestUrl()
    {
        return $this->getParameter('gatewayTestUrl');
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
    public function setReturnUrlSecondary($value)
    {
        $this->setParameter('returnUrlSecondary', $value);
    }

    /**
     * @return string
     */
    public function getReturnUrlSecondary()
    {
        return $this->getParameter('returnUrlSecondary');
    }

    public function setPrivateCertificatePath($value)
    {
        $this->setParameter('privateCertificatePath', $value);
    }


    public function getPrivateCertificatePath()
    {
        return $this->getParameter('privateCertificatePath');
    }


    public function setPrivateCertificatePassword($value)
    {
        $this->setParameter('privateCertificatePassword', $value);
    }

    public function getPrivateCertificatePassword()
    {
        return $this->getParameter('privateCertificatePassword');
    }

    public function setPublicCertificatePath($value)
    {
        $this->setParameter('publicCertificatePath', $value);
    }

    public function getPublicCertificatePath()
    {
        return $this->getParameter('publicCertificatePath');
    }

    /**
     * @param $value
     */
    public function setTestMode($value)
    {
        $this->setParameter('testMode', $value);
    }

    /**
     * @return mixed
     */
    public function getTestMode()
    {
        return $this->getParameter('testMode');
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
    public function getLanguage()
    {
        return $this->getParameter('language');
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