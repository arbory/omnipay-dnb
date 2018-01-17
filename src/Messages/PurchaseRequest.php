<?php

namespace Omnipay\DnbLink\Messages;

use Omnipay\DnbLink\Utils\Pizza;

class PurchaseRequest extends AbstractRequest
{

    /**
     * @return array
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    private function getEncodedData()
    {
        $data = [
            'VK_SERVICE'    => '1002', // Service code
            'VK_VERSION'    => '101', // Protocol version
            'VK_SND_ID'     => $this->getMerchantId(),
            'VK_STAMP'      => $this->getTransactionReference(),  // Max 20 length
            'VK_AMOUNT'     => $this->getAmount(), // Decimal with point
            'VK_CURR'       => $this->getCurrency(), // ISO 4217 format (LVL/EUR, etc.)
            'VK_ACC'        => $this->getMerchantId(),
            'VK_NAME'        => $this->getMerchantId(),
            'VK_REG_ID'        => $this->getMerchantId(),
            'VK_SWIFT'        => $this->getMerchantId(),
            'VK_REF'        => $this->getTransactionReference(),  // Max 20 length
            'VK_MSG'        => $this->getDescription(), // Max 300 length,
            'VK_RETURN'     => $this->getReturnUrl(), // 400 characters max
            'VK_RETURN2'     => $this->getBackupReturnUrl(), // 400 characters max
        ];
        return $data;
    }

    /**
     * @return array
     */
    private function getDecodedData(){
        $data = [
            'VK_MAC'        => $this->generateControlCode($this->getEncodedData()), // MAC - Control code / signature
            'VK_LANG'       => $this->getLanguage(), // Communication language (LAT, ENG RUS), no format standard?
            'VK_TIME_LIMIT' => $this->getTimeLimit(), // Communication language (LAT, ENG RUS), no format standard?
        ];

        return $data;
    }

    /**
     * @param $data
     * @return string
     */
    private function generateControlCode($data)
    {
        return Pizza::generateControlCode($data, $this->getEncoding(), $this->getCertificatePath());
    }

    /**
     * @param $value
     */
    public function setMerchantId($value)
    {
        $this->setParameter('merchantId', $value);
    }

    /**
     * @return mixed
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
     * Glue together encoded and raw data
     * @return array
     */
    public function getData()
    {
        $data = $this->getEncodedData() + $this->getDecodedData();
        return $data;
    }

    /**
     * @param       $httpResponse
     * @param array $data
     * @return PurchaseResponse
     */
    public function createResponse(array $data)
    {
        return $purchaseResponseObj = new PurchaseResponse($this, $data);
    }
}