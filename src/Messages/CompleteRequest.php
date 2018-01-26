<?php

namespace Omnipay\DnbLink\Messages;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\DnbLink\Utils\Pizza;
use Symfony\Component\HttpFoundation\ParameterBag;

class CompleteRequest extends AbstractRequest
{
    protected $responseKeys = [
        'VK_SERVICE' => true,
        'VK_VERSION' => true,
        'VK_SND_ID' => true,
        'VK_REC_ID' => true,
        'VK_STAMP' => true,
        'VK_T_NO' => true,
        'VK_AMOUNT' => true,
        'VK_CURR' => true,
        'VK_REC_ACC' => true,
        'VK_REC_NAME' => true,
        'VK_REC_REG_ID' => true,
        'VK_REC_SWIFT' => true,
        'VK_SND_ACC' => true,
        'VK_SND_NAME' => true,
        'VK_REF' => true,
        'VK_MSG' => true,
        'VK_T_DATE' => true,
        'VK_T_STATUS' => true,
        'VK_MAC' => false,
        'VK_LANG' => false
    ];

    public function getData()
    {
        return $this->httpRequest->request->all();
    }

    /*
     * Faking sending flow
     */
    public function createResponse(array $data)
    {
        // Read data from request object
        return $purchaseResponseObj = new CompleteResponse($this, $data);
    }

    /**
     * @param mixed $data
     * @return \Omnipay\Common\Message\ResponseInterface|AbstractResponse|CompleteResponse
     * @throws InvalidRequestException
     */
    public function sendData($data)
    {
        //Validate response data before we process further
        $this->validate();

        // Create fake response flow
        /** @var CompleteResponse $purchaseResponseObj */
        $response = $this->createResponse($data);
        return $response;
    }

    /**
     * @throws InvalidRequestException
     */
    public function validate()
    {
        $response = $this->getData();
        if(!isset($response['VK_SERVICE']) || !in_array($response['VK_SERVICE'], ['1102']))
        {
            throw new InvalidRequestException('Unknown VK_SERVICE code');
        }

        $responseFields = $this->responseKeys;

        //check for missing fields, will throw exc. on missing fields
        foreach ($responseFields as $fieldName => $usedInHash ) {
            if (! isset($response[$fieldName])) {
                throw new InvalidRequestException("The $fieldName parameter is required");
            }
        }

        //verify data corruption
        $this->validateIntegrity($responseFields);
    }

    /**
     * @param array $responseFields
     * @throws InvalidRequestException
     */
    protected function validateIntegrity(array $responseFields)
    {
        $responseData = new ParameterBag($this->getData());

        // Get keys that are required for control code generation
        $controlCodeKeys = array_filter($responseFields, function($val){ return $val; });

        // Get control code required fields with values
        $controlCodeFields = array_intersect_key( $responseData->all(), $controlCodeKeys );

        //If you are testing requests by spoofing manually bank response, don't forget to url encode VK_MAC value
        //https://stackoverflow.com/questions/5628738/strange-base64-encode-decode-problem
        //$test = Pizza::test($controlCodeFields, $this->getCertificatePath(), $this->getEncoding());

        if(!Pizza::isValidControlCode($controlCodeFields, $responseData->get('VK_MAC'), $this->getPublicCertificatePath(), $this->getEncoding())){
            throw new InvalidRequestException('Data is corrupt or has been changed by a third party');
        }
    }
}